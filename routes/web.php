<?php



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('client', 'ClientController');
Route::resource('task', 'TaskController');
Route::get('/{id}/tasks', 'UsersTasksController@show');