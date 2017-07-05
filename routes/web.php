<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('client', 'ClientController');
Route::resource('task', 'TaskController');
Route::get('/{id}/tasks', 'UsersTasksController@show');