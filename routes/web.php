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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard','HomeController@index')->name('dashboard');
Route::get('users','UserController@show')->name('users');
Route::get('adduser','UserController@create')->name('adduser');
Route::post('add-User','UserController@store')->name('add-User');
Route::get('edituser/{id}','UserController@edit');
Route::post('update_user/{id}','UserController@update')->name('update.user');
Route::delete('deleteuser/{id}','UserController@destroy')->name('deleteuser');
Route::get('statuschangeuser','Usercontroller@statuschange_user')->name('statuschangeuser');
Route::get('profile-update/{id}','UserController@profileUpdate')->name('profile-update');
Route::get('user_status','UserController@change_Status')->name('user_status');