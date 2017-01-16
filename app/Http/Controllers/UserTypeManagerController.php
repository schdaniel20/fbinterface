<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserType;
use App\Permission;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserTypeManagerController extends Controller {

    protected $redirectPath = '/types';

    public function __construct() {
        $this->middleware('auth');

        foreach ($this->permissions() as $permission) {
            $this->middleware('permission:' . $permission);
        }
    }

    protected function permissions(): array {
        return [
            'access manage user types'
        ];
    }

    public function edit(UserType $userType) {
        $allPermissions = Permission::all();
        $existing = $userType->permissions->pluck('id')->toArray();

        return view('userType.edit', [
            'userType' => $userType,
            'allPermissions' => $allPermissions,
            'existing' => $existing
        ]);
    }

    public function setRole(UserType $userType, Request $request) {
        $validator = Validator::make($request->all(), [
                    'title' => 'required|min:2',
                    'description' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $title = $request->get('title');
        $desc = $request->get('description');

        $userType->title = $title;
        $userType->description = $desc;
        $userType->save();

        return redirect()->back();
    }

    public function setPermissions(UserType $userType, Request $request) {
        $userType->permissions()->sync($request->get('permissions'));

        return redirect()->back();
    }

    public function deleteUserType(UserType $userType) {
        return view('userType.delete', ['title' => $userType->title]);
    }

    public function delete(UserType $userType) {
        //TODO transaction if 1 fails
        User::where('type_id', '=', $userType->id)
                ->update(['type_id' => 0]);

        $userType->permissions()->sync([]);
        $userType->delete();
        return redirect($this->redirectPath);
    }

    public function addUserType() {
        return view('userType.add');
    }

    public function add(Request $request) {

        $validator = Validator::make($request->all(), [
                    'title' => 'required|min:2',
                    'description' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $title = $request->get('title');
        $desc = $request->get('description');

        $newType = new UserType();
        $newType->title = $title;
        $newType->description = $desc;
        $newType->save();

        return redirect($this->redirectPath);
    }

}
