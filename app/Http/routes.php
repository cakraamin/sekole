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

$app->get('/', function () use ($app) {
    //return $app->version();
    return view('index');
});

$app->post('/create-sekolah',      'SekolahController@store');
$app->get('/sekolah',        'SekolahController@index');
$app->get('/sekolah/{id}',    'SekolahController@show');
$app->post('/edit-sekolah/{id}', 'SekolahController@update');
$app->post('/delete-sekolah/{id}', 'SekolahController@destroy');