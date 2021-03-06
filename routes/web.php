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
    Route::get('/', 'Controller@index');
    //LOGIN//
    Route::get('auth','userLoginController@auth_user')->name('auth_user');
    Route::post('auth', 'userLoginController@doLogin')->name('login_user');
    //LOGIN//
    //SIGNUP//
    Route::get('register', 'userLoginController@register')->name('register_user_page');
    Route::post('register', 'userLoginController@registerform')->name('register_user');
    //SIGNUP//
    //SOCHIAL LOGIN//
    Route::get('auth/google', 'userLoginController@redirectToProvider')->name('googleLogin');
    Route::get('auth/google/callback', 'userLoginController@handleProviderCallback');
    //SOCHIAL LOGIN//
    //FORGET PASSWORD//
    Route::get('forgetpassword', 'userLoginController@forgetpassword')->name('forgetpassword');
        Route::post('forgetpassword', 'userLoginController@doforgetpassword');
        //FORGET PASSWORD//
//AUTH USERS ROUTES
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    //******************************//
    Route::get('dashboard', 'Controller@index')->name('dashboard');
    Route::get('delete/{id}', 'Controller@delete');
    //LOGOUT//
    Route::get('logoutuser', 'userLoginController@logout')->name('logout_user');
    //LOGOUT/
    //******************************//
    //AUTH USERS ROUTES
    //EXTRA PAGES
    //******************************//
    Route::get('posts', 'userPostsController@index')->name('posts');
    Route::get('postscreate', 'userPostsController@create')->name('postscreate');
    Route::post('postscreate', 'userPostsController@store');
    Route::get('postsedit', 'userPostsController@edit')->name('postsedit');
    Route::get('postsedit{id}', 'userPostsController@postedit')->name('postedit');
    Route::post('postsedit{id}', 'userPostsController@update')->name('update');
    Route::get('postsdelete{id}', 'userPostsController@destroy')->name('postsdelete');
    Route::get('postlist', 'userPostsController@postlist')->name('postslist');
    //******************************//
    //EXTRA PAGES
    //category
    Route::get('categorycreate', 'Category@index')->name('categorycreate');
    Route::post('categorycreate', 'Category@store');
    //category

});