<?php

namespace App\Http\Controllers;

use App\SessionStatus;
use App\FbSessions;
use App\FileManager\FileManager;
use App\Facebook\ConfigFile;
use Illuminate\Http\Request;
use App\Facebook\Container;

class CrawlerController extends Controller {

    public function __construct() {
        $this->middleware('auth');

        foreach ($this->permissions() as $permission) {
            $this->middleware('permission:' . $permission);
        }
    }

    protected function permissions(): array {
        return [
            'run facebook crawler',
            'run facebook parser'
        ];
    }

    public function crawler(FbSessions $fbSessions, Container $container) {
        $sessionId = $fbSessions->sessionId;
        $sessionName = $fbSessions->sessionName;
        $country = $fbSessions->country_code;

        $app = $container->get('app');
        $source = $container->get('linkSource');
        $target = $container->get('result');
        $field = $container->get('fields');

        $errors = [];

        //check if the component array has any error
        if (!$app->hasError() && !$source->hasError() && !$target->hasError() && !$field->hasError()) {
            $config = new ConfigFile($sessionId, $country);
            $config->createConfig($app->getResponse(), $field->getResponse(), $target->getResponse(), $source->getResponse());

            $res = $config->getConfig();
            $fileName = $sessionId . "_" . $sessionName;

            $manager = new FileManager($fileName);
            $location = $manager->inToJson($res);
            //php artisan queue:work
            $fbSessions->setStatus(SessionStatus::STARTING);
            dispatch(
                    (new \App\Jobs\FacebookCrawler($location, $sessionId))
                            ->onQueue('crawler')
                );
        } else {
            $app->hasError() ? $errors['startErrors'][] = $app->getErrorMessage() : '';
            $source->hasError() ? $errors['startErrors'][] = $source->getErrorMessage() : '';
            $target->hasError() ? $errors['startErrors'][] = $target->getErrorMessage() : '';
            $field->hasError() ? $errors['startErrors'][] = $field->getErrorMessage() : '';
        }

        return redirect()->back()->withErrors($errors);
    }

    public function parser(FbSessions $fbSessions, Container $container, Request $request) {

        $source = $container->get('result');
        $target = $container->get('parser', $request->get('server', 0));
        $customTable = $request->get('table', null);
        $errors = [];

        if ($customTable) {
            $target->set('table', $customTable);
        }
        
        if (!$source->hasError() && !$target->hasError()) {
            $fbSessions->setStatus(SessionStatus::STARTING);
            
            dispatch(
                    (new \App\Jobs\FacebookParser($fbSessions->sessionId, $source->getResponse(), $target->getResponse()))
                            ->onQueue('parser')
                );
        } else {
            $source->hasError() ? $errors['startErrors'][] = $source->getErrorMessage() : "";
            $target->hasError() ? $errors['startErrors'][] = $target->getErrorMessage() : "";
        }

        return redirect()->back()->withErrors($errors);
    }
}
