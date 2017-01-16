<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FbSessions;
use App\Facebook;
use App\FacebookAppResult;
use App\FacebookExtractedData;
use Illuminate\Support\Facades\DB;
use \Exception;

class StatusController extends Controller {

    public function __construct() {
        $this->middleware('auth');

        foreach ($this->permissions() as $permission) {
            $this->middleware('permission:' . $permission);
        }
    }

    protected function permissions(): array {
        return [
            'set session status'
        ];
    }

    public function setStatus(FbSessions $fbSessions, Request $request) {
        $status = $request->get('status', 0);
        $status = $status == 0 | $status == 2 ? $status : 0;
        $model = null;
        $deleteExtractedData = false;

        if ($status == 0) {
            $model = Facebook::class;
        } elseif ($status == 2) {
            $model = FacebookAppResult::class;
            $deleteExtractedData = true;
        }
        $errors = [];
        DB::beginTransaction();

        try {
            $fbSessions->status = $status;
            $fbSessions->save();

            $model::where('sessionId', "=", $fbSessions->sessionId)
                    ->update(['processed' => 0]);
            //delete the data extracted by the parse
            if ($deleteExtractedData) {
                FacebookExtractedData::where('sessionId', "=", $fbSessions->sessionId)->delete();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $errors['setStatus'][] = $e->getMessage();
        }

        return redirect()->back()->withErrors($errors);
    }

}
