<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionStatus extends Model
{
    protected $table = 'fb_session_status';
    const NOTPROCESSED      = 0;
    const FBRUNNING         = 1;
    const FBFINISHED        = 2;
    const PARSERRUNNING     = 3;
    const PARSERFINISHED    = 4;
    const CRAWLERERROR      = 5;
    const PARSERERROR       = 6;
    const STARTING          = 7;


    public function sessions() {
        return $this->belongsToMany('App\FbSessions', 'status', 'statusID');
    }
}
