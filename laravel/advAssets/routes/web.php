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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/info/{id}', 'userController@show')->name('users.show')->middleware('auth','uniqueId');
Route::get('/users/publications/{id}', 'userController@showPublications')->name('users.publications')->middleware('auth', 'uniqueId');

Route::patch('/users/update/{id}', 'userController@update')->name('users.update')->middleware('auth');
Route::patch('/users/updatePassword/{id}', 'userController@updatePassword')->name('users.updatePassword')->middleware('auth');
