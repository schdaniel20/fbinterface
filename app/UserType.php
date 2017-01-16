<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model {

    public $timestamps = false;

    public function users() {
        return $this->hasMany('App\User', 'type_id');
    }

    public function permissions() {
        return $this->belongsToMany('App\Permission', 'type_permissions', 'type_id', 'permission_id');
    }

}
