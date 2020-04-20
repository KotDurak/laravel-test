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

Route::get('/', function () {
    return view('home');
});

Route::get('/projects', function() {
    return view('projects');
});

Route::get('/settings', function() {
    return view('settings');
});

Route::get('project/{id}', function($id) {
    return 'Id проекта ' . $id;
});

Route::get('users', 'UserController@index');

Route::get('users/create', 'UserController@create');

Route::get('users/update/{id}', 'UserController@update');

Route::post('users/storage', 'UserController@storage');

Route::put('users/edit/{id}', 'UserController@edit');