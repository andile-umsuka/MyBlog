<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('post', 'PostController');
Route::resource('role', 'RoleController');
Route::resource('permission', 'PermissionController');
Route::resource('user', 'UserController');
Route::post('role', 'RoleController@permission')->name('permission.assign');
