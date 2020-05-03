<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', 'LoginController@login')->name('login');

Route::get('logout', 'LoginController@logout');

Route::get('auth', 'LoginController@auth');

Route::get('/', 'MainPage');

Route::get('/projects', 'ProjectController@index');

Route::get('/settings', function() {
    return view('settings');
});

Route::get('project/{id}', 'ProjectController@show')->name('project.show');

Route::get('users', 'UserController@index');

Route::get('users/create', 'UserController@create');

Route::get('users/update/{id}', 'UserController@update')->name('user.update');

Route::post('users/storage', 'UserController@storage');

Route::put('users/edit/{id}', 'UserController@edit');

Route::delete('users/{id}', 'UserController@delete');

Route::get('projects/create', 'ProjectController@create')->name('project.create');

Route::middleware(['auth'])->group(function(){
    Route::get('chat/{id}', 'ChatController@index')->name('chat');
});



Route::post('projects/store', 'ProjectController@store')->name('project.store');