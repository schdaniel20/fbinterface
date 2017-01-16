<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbSessions extends Model {

    protected $table = "fb_sessions";
    protected $primaryKey = 'sessionId';
    public $timestamps = false;

    public function statusName() {
        return $this->hasOne('App\SessionStatus', 'statusID', 'status');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'createdBy');
    }

    public function country() {
        return $this->hasOne('App\Country', 'countryID', 'country_code');
    }

    public function errors() {
        return $this->hasMany('App\Error', 'sessionId', 'sessionId');
    }

    public function setStatus(int $statusId) {
        $this->status = $statusId;
        $this->save();
    }

    //$obj->linksCount
    public function linksCountRelation() {
        return $this->hasOne('App\Facebook', 'sessionId', 'sessionId')
                        ->selectRaw('sessionId, count(*) as count')
                        ->groupBy('sessionId');
    }

    public function getLinksCountAttribute() {
        $result = $this->linksCountRelation;
        return $result ? $result->count : 0;
    }

    //$obj->processedCount
    public function processedCountRelation() {
        return $this->hasOne('App\Facebook', 'sessionId', 'sessionId')
                        ->selectRaw('sessionId, count(*) as count')
                        ->where('processed', '=', '0')
                        ->groupBy('sessionId');
    }

    public function getProcessedCountAttribute() {
        $result = $this->processedCountRelation;
        return $result ? $result->count : 0;
    }

    //$obj->resultCount
    public function resultCountRelation() {
        return $this->hasOne('App\FacebookAppResult', 'sessionId', 'sessionId')
                        ->selectRaw('sessionId, count(*) as count')
                        ->where('processed', '=', '0')
                        ->groupBy('sessionId');
    }

    public function getResultCountAttribute() {
        $result = $this->resultCountRelation;
        return $result ? $result->count : 0;
    }

}
