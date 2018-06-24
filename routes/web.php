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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();

/*Route::group(['prefix' => 'user'], function () {
	Route::post('/login', 'AdminAuth\LoginController@login');
	Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
	Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
	Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
})->middleware('auth');*/
