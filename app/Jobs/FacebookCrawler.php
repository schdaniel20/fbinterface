<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Facebook\Facebook;
use Cylex\Crawlers\Facebook\Crawler;
use Cylex\Crawlers\Facebook\DataSource;
use Cylex\Crawlers\Facebook\DataTarget;
use App\Facebook\ErrorHandler;
use Illuminate\Support\Facades\Storage;

class FacebookCrawler implements ShouldQueue {

    use InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $configFile;
    protected $sessionId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $configFile, int $sessionId) {
        $this->configFile = $configFile;
        $this->sessionId = $sessionId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        if (!Storage::disk('local')->exists($this->configFile)) {
            user_error('The Config file was not found: ' . $this->configFile, E_USER_ERROR);
        }

        $conf = json_decode(Storage::get($this->configFile), true);

        $fb = $conf['facebook'];

        $app = new Facebook(array(
            'app_id' => $fb['id'],
            'app_secret' => $fb['secret'],
            'default_access_token' => $fb['token'],
            'default_graph_version' => $fb['graph'],
        ));

        $source = new DataSource($conf['source'], $conf['countryCode'], $conf['sessionID']);
        $target = new DataTarget($conf['target']);

        $crawler = new Crawler($source, $target);
        $crawler->init();

        $crawler->run($app, $conf['fields']);
    }

    public function failed(\Exception $exception) {
        $error = new ErrorHandler;
        $error->createError($this->sessionId, $exception->getCode(), $exception->getMessage());
    }

}
