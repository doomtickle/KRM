<?php



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('client', 'ClientController');
Route::resource('task', 'TaskController');
Route::resource('note', 'NoteController');
Route::get('/{id}/tasks', 'UsersTasksController@show');
Route::get('/task/{task}/notes', 'TaskNotesController@index');
