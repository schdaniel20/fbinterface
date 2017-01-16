<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function type() {
        return $this->belongsTo('App\UserType');
    }

    public function hasPermission(string $permission) {
        $existingdPermissions = $this->type->permissions;

        foreach ($existingdPermissions as $ep) {
            if ($ep->title == $permission) {
                return true;
            }
        }
        return false;
    }

}
