<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    public function type() {
        return $this->belongsToMany('App\UserType', 'type_permissions', 'permission_id', 'type_id');
    }

}
