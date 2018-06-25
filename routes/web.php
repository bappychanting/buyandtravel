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

Route::get('/', 'HomeController@index')->name('buyandtravel');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();

Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function () {
	Route::get('/summery', 'ProfileController@index')->name('profile.summery');
	Route::get('/userinfo', 'ProfileController@userinfo')->name('profile.userinfo');
	Route::put('/updateuserInfo/{id}', 'ProfileController@updateuserInfo')->name('update.updateuserInfo');
	Route::put('/updatecontactinfo/{id}', 'ProfileController@updatecontactinfo')->name('update.updatecontactinfo');
});
