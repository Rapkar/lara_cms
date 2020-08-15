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



//AUTH USERS ROUTES


//******************************//
Route::get('/','Controller@index');
Route::get('dashboard','Controller@index')->name('dashboard');
Route::get('delete/{id}','Controller@delete');

                                    //SIGNUP//
Route::get('register','userLoginController@register')->name('register_user_page');
Route::post('register','userLoginController@registerform')->name('register_user');
                                    //SIGNUP//

                                    //LOGIN//
Route::get('auth','userLoginController@auth_user')->name('auth_user');
Route::post('auth','userLoginController@doLogin')->name('login_user');
                                   //LOGIN//

                                   //FORGET PASSWORD//
Route::get('forgetpassword','userLoginController@forgetpassword')->name('forgetpassword');
Route::post('forgetpassword','userLoginController@doforgetpassword');
                                   //FORGET PASSWORD//

                                   //LOGOUT//
Route::get('logoutuser','userLoginController@logout')->name('logout_user');
                                   //LOGOUT//

                                   //SOCHIAL LOGIN//
Route::get('auth/google', 'userLoginController@redirectToProvider')->name('googleLogin');
Route::get('auth/google/callback', 'userLoginController@handleProviderCallback');
                                   //SOCHIAL LOGIN//
//******************************//


//AUTH USERS ROUTES


//EXTRA PAGES
//******************************//
Route::get('posts', 'userPostsController@index')->name('posts');
Route::get('postscreate', 'userPostsController@create')->name('postscreate');
Route::get('postsedit', 'userPostsController@edit')->name('postsedit');
Route::get('postsdelete', 'userPostsController@delete')->name('postsdelete');
Route::get('postlist', 'userPostsController@postlist')->name('postslist');
//******************************//
//EXTRA PAGES

