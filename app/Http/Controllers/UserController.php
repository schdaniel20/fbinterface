<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\UserType;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

    protected $redirectUrl = 'user/list';

    public function __construct() {
        $this->middleware('auth');

        foreach ($this->permissions() as $permission) {
            $this->middleware('permission:' . $permission);
        }
    }

    protected function permissions(): array {
        return [
            'manage users',
        ];
    }

    public function listUsers() {
        $users = User::all();
        return view('user.list', ['users' => $users]);
    }

    public function edit(User $user) {
        $types = UserType::where('id', '<>', 0)->get()->pluck('title', 'id');
        return view('user.edit', ['user' => $user, 'types' => $types]);
    }

    public function set(User $user, Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->get('name');
        $type = $request->get('type');

        $user->name = $name;
        $user->type_id = $type;
        $user->update();

        return redirect($this->redirectUrl);
    }

}
