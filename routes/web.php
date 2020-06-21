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

Route::get('/','Controller@index');
Route::get('/dashboard','Controller@index')->name('dashboard');
Route::get('/delete/{id}','Controller@delete');
Route::get('/register','userLoginController@register');
Route::post('/register','userLoginController@registerform')->name('register_user');
Route::get('/auth','userLoginController@auth_user')->name('auth_user');
Route::post('/auth','userLoginController@doLogin')->name('login_user');
Route::get('/logoutuser','userLoginController@logout')->name('logout_user');

