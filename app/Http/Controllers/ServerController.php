<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Server;
use Illuminate\Support\Facades\Validator;

class ServerController extends Controller {

    protected $redirectPath = '/servers';

    public function __construct() {
        $this->middleware('auth');

//        foreach ($this->permissions() as $permission)
//        {
//            $this->middleware('permission:'. $permission);
//        }
    }

    protected function permissions(): array {
        return [
            'access user server list',
            'access edit servers',
        ];
    }

    public function listServer() {
        $servers = Server::all();
        return view('server.list', ['servers' => $servers]);
    }

    public function addServer() {
        return view('server.add');
    }

    public function addNew(Request $request) {
        
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'table' => 'required',
                    'host' => 'required',
                    'database' => 'required',
                    'user' => 'required',
                    'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $name = $request->get('name');
        $table = $request->get('table');
        $host = $request->get('host');
        $database = $request->get('database');
        $user = $request->get('user');
        $password = $request->get('password');

        $dsn = "mysql:host=$host;dbname=$database;charset=utf8";

        $server = new Server();
        $server->name = $name;
        $server->table = $table;
        $server->dsn = $dsn;
        $server->user = $user;
        $server->password = $password;
        $server->save();

        return redirect($this->redirectPath);
    }

    public function editServer(Server $server) {
        
        return view('server.edit', ['server' => $server]);
    }
    
    public function saveServer(Request $request, Server $server) {
        
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'dsn' => 'required',
                    'user' => 'required',
                    'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $name = $request->get('name');
        $table = $request->get('table');
        $dsn = $request->get('dsn');        
        $user = $request->get('user');
        $password = $request->get('password');
        
        $server->name = $name;
        $server->table = $table;
        $server->dsn = $dsn;
        $server->user = $user;
        $server->password = $password;        
        $server->update();
        
        return redirect($this->redirectPath);
        
    }
    
    public function deleteServer(Server $server)
    {
        return view('server.delete', ['server' => $server->dsn]);
    }
    
    public function delete(Server $server)
    {
        $server->delete();
        return redirect($this->redirectPath);
    }

}
