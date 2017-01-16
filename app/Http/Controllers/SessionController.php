<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;
use App\Country;
use App\SessionStatus;
use App\FbSessions;
use App\Server;

class SessionController extends Controller {

    public function __construct() {
        $this->middleware('auth');

        foreach ($this->permissions() as $permission) {
            $this->middleware('permission:' . $permission);
        }
    }

    protected function permissions(): array {
        return [
            'access session search',
            'access session information'
        ];
    }

    public function searchInterface() {
        $countryList = Country::all(['countryId', 'country'])->pluck('country', 'countryId')->toArray();

        $status = SessionStatus::all(['statusID', 'statusName'])->pluck('statusName', 'statusID')->toArray();
        $status = ['-1' => 'All'] + $status;        
        $facebookSessions = \Session::get('facebook');
        
        return view('search', ['countryList' => $countryList, 'status' => $status, 'fbs' => $facebookSessions]);
    }

    public function search(Request $request) {
        $countryCode = $request->get('country');
        $status = $request->get('status');

        $facebookSession = FbSessions::where('country_code', '=', $countryCode);

        if ($status != -1) {
            $facebookSession = $facebookSession->where('status', '=', $status);
        }
        $facebookSession = $facebookSession->paginate(15);
        $facebookSession = $facebookSession->appends(Input::except('page'));
        return redirect()->back()->with('facebook', $facebookSession)->withInput();
    }

    public function show(FbSessions $fbSessions) {
        switch ($fbSessions->status) {
            case SessionStatus::NOTPROCESSED:
                $crawler = 0;
                $parser = 1;
                break;
            case SessionStatus::FBFINISHED:
                $crawler = 1;
                $parser = 0;
                break;
            case SessionStatus::CRAWLERERROR:
                $crawler = -1;
                $parser = 1;
                break;
            case SessionStatus::PARSERERROR:
                $crawler = 1;
                $parser = -1;
                break;
            default :
                $crawler = 1;
                $parser = 1;
        }
        
        $servers = [];
        
        if($parser == 0)
        {
            $servers = Server::all(['id', 'name'])->pluck('name','id')->toArray();
        }

        return view('show', [
            'fb' => $fbSessions,
            'crawler' => $crawler,
            'parser' => $parser,
            'servers' => $servers,
        ]);
    }

}
