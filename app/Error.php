<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model {

    public function session() {
        return $this->belongsTo('App\FbSessions', 'sessionId', 'sessionId');
    }

}
