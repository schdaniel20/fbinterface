<?php

namespace App\Http\Controllers;

use App\UserType;

class UserTypeController extends Controller {

    protected $redirectPath = '/types';

    public function __construct() {
        $this->middleware('auth');

        foreach ($this->permissions() as $permission) {
            $this->middleware('permission:' . $permission);
        }
    }

    protected function permissions(): array {
        return [
            'access user type list',
        ];
    }

    public function userTypeList() {
        $userTypes = UserType::where('id', '<>', 0)->get();

        return view('userType.type', ['userTypes' => $userTypes]);
    }
}
