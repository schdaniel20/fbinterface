<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::group(['middleware' => 'web'], function () {
  Route::auth();
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/session', 'SessionController@searchInterface');

Route::get('/session/search', 'SessionController@search');

Route::get('/session/{fbSessions}', 'SessionController@show');

Route::get('/session/{fbSessions}/start','CrawlerController@crawler');

Route::post('/session/{fbSessions}/setstatus', 'StatusController@setStatus');

Route::get('/session/{fbSessions}/parse','CrawlerController@parser');

Route::get('/register/success', 'Auth\RegisterController@success');

Route::get('/types', 'UserTypeController@userTypeList');

Route::get('/types/edit/{userType}', 'UserTypeManagerController@edit');

Route::post('/types/edit/{userType}/setrole', 'UserTypeManagerController@setRole');

Route::post('/types/edit/{userType}/setpermissions', 'UserTypeManagerController@setPermissions');

Route::get('/types/edit/{userType}/delete', 'UserTypeManagerController@deleteUserType');

Route::post('/types/edit/{userType}/delete', 'UserTypeManagerController@delete');

Route::get('/types/add', 'UserTypeManagerController@addUserType');

Route::post('/types/add', 'UserTypeManagerController@add');

Route::get('/550', function(){
    return view('errors.550');
});

Route::get('/servers', 'ServerController@listServer');

Route::get('/servers/add', 'ServerController@addServer');

Route::post('/servers/add', 'ServerController@addNew');

Route::get('/servers/{server}/edit', 'ServerController@editServer');

Route::post('/servers/{server}/edit', 'ServerController@saveServer');

Route::get('/servers/{server}/delete', 'ServerController@deleteServer');

Route::post('/servers/{server}/delete', 'ServerController@delete');

Route::get('/test', 'TestController@show');

Route::get('/user/list', 'UserController@listUsers');

Route::get('/user/{user}/edit', 'UserController@edit');

Route::post('/user/{user}/edit', 'UserController@set');
