<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'sistemas'], function () use($router){
   $router->get('/', 'SistemaController@index');
   $router->get('/show/{id}', 'SistemaController@show');
   $router->post('/create', 'SistemaController@store');
   $router->put('/edit/{id}', 'SistemaController@update');
   $router->delete('/delete/{id}', 'SistemaController@destroy');
});

$router->group(['prefix' => 'auth'], function () use($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
