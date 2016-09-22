<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
$api = app('Dingo\Api\Routing\Router');
Route::get('/', function () {
    return view('welcome');
});

$api->version('v1',['namespace' => 'App\Http\Controllers'], function ($api) {

  $api->group(['middleware' => 'api.auth'], function ($api) {
    $api->get('personas', 'PersonaController@index');
  });

  $api->post('authenticate', 'Auth\OAuthController@authorizeClient');
});

$api->version('v2',['namespace' => 'App\Http\Controllers'], function ($api) {
  $api->get('personas', 'PersonaController@index');
});
