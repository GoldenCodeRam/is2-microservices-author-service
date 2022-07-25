<?php

use App\Http\Controllers\AuthorController;

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

$router->get('/author', 'AuthorController@index');
$router->get('/author/{id}', 'AuthorController@show');
$router->post('/author', 'AuthorController@store');
$router->put('/author/{id}', 'AuthorController@update');
$router->patch('/author/{id}', 'AuthorController@update');
$router->delete('/author/{id}', 'AuthorContorller@delete');
