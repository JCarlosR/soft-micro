<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clients', 'ClientController@index');
Route::post('/clients', 'ClientController@store');
Route::delete('/clients', 'ClientController@delete');

Route::get('/modules', 'ModuleController@index');
Route::post('/modules', 'ClientController@store');
Route::delete('/modules', 'ClientController@delete');

Route::get('/events', 'EventController@index');
Route::delete('/events', 'EventController@destroy');
Route::get('/events/create', 'EventController@store');
Route::get('/events/complete', 'EventController@complete');

Route::get('/heart-beats/create', 'HeartBeatController@store');

Route::get('/example/txt', 'ExampleResponseController@txt');
Route::get('/example/html', 'ExampleResponseController@html');
Route::get('/example/json', 'ExampleResponseController@json');
