<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'userconfig'], function (\Laravel\Lumen\Routing\Router $router) {
    $router->post('/load', [
		'as' => 'usercfg-load',
		'uses' => 'UserConfigController@load',
	]);
    $router->post('/save', [
		'middleware' => 'ro-auth',
		'as' => 'usercfg-save',
		'uses' => 'UserConfigController@save'
	]);
});

$router->group(['prefix' => 'emblem'], function (\Laravel\Lumen\Routing\Router $router) {
    $router->post('/upload',[
        'middleware' => 'ro-auth',
		'as' => 'emblem-upload',
        'uses' => 'EmblemController@upload'
    ]);
    $router->post('/download', ['as' => 'emblem-download', 'uses' => 'EmblemController@download']);
});
