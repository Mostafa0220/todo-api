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

use Illuminate\Http\JsonResponse;

$router->get('/', function () use ($router): JsonResponse {
    return new JsonResponse([
        'message' => 'OK',
        'data' => [
            'api_version' => '1.1.0',
            'framework_version' => $router->app->version(),
        ]
    ]);
});

$router->post('/login', 'AuthController@login');
$router->post('/register', 'AuthController@register');

$router->group(['middleware' => 'auth'], function ($router) {
    $router->get('/logout', 'AuthController@logout');
    
    $router->get('/todo', 'TodoController@search');
    $router->post('/todo', 'TodoController@create');
    $router->patch('/todo/{id}', 'TodoController@update');
    $router->delete('/todo/{id}', 'TodoController@delete');

    $router->get('/category', 'CategoryController@index');
    $router->post('/category', 'CategoryController@create');
    $router->patch('/category/{id}', 'CategoryController@update');
    $router->delete('/category/{id}', 'CategoryController@delete');

});
