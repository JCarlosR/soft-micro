<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clients', 'ClientController@index');
Route::post('/clients', 'ClientController@store');

Route::get('/modules', 'ModuleController@index');
Route::post('/modules', 'ClientController@store');

Route::get('/events', 'EventController@index');
Route::get('/events/create', 'EventController@store');

Route::get('/heart-beats/create', 'HeartBeatController@store');

