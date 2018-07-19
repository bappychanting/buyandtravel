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

Route::group(['prefix' => 'orders'], function(){
	Route::get('/', 'OrderController@index')->name('front.orders.index');
	Route::get('/{id}', 'OrderController@show')->name('front.orders.show');
	Route::get('/downloadPDF/{id}', 'OrderController@downloadPDF')->name('front.orders.pdf');
	Route::get('/{id}/addOffer', 'OrderController@addOffer')->name('front.orders.addOffer');
});

Route::group(['prefix' => 'travel'], function(){
	Route::get('/', 'TravelerController@index')->name('front.travel.index');
	Route::get('/{id}', 'TravelerController@show')->name('front.travel.show');
	Route::get('/downloadPDF/{id}', 'TravelerController@downloadPDF')->name('front.travel.pdf');
});

Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function () {

	Route::get('/summery', 'ProfileController@index')->name('profile.summery');
	Route::get('/user/verify/{token}', 'ProfileController@verifyUser')->name('user.verify');
	Route::get('/user/verificationlink', 'ProfileController@verificationMail')->name('user.verification');

	Route::resource('orders', 'OrderController');
	Route::post('/orders/image/add', 'OrderController@addImage')->name('order.image.add');
	Route::delete('/orders/image/delete/{id}', 'OrderController@deleteImage')->name('order.image.delete');

	Route::resource('offers', 'OfferController');
	Route::put('/offers/{id}/accept', 'OfferController@approve')->name('offers.accept');
	Route::put('/offers/{id}/reject', 'OfferController@reject')->name('offers.reject');
	Route::put('/offers/{id}/deliver', 'OfferController@deliver')->name('offers.deliver');
	Route::put('/offers/{id}/recieve', 'OfferController@recieve')->name('offers.recieve');
	
	Route::resource('travel', 'TravelController');

	Route::group(['prefix' => 'user'], function(){
		Route::get('/', 'ProfileController@userinfo')->name('user.userinfo');
		Route::put('/storeImage/{id}', 'ProfileController@updateImage')->name('user.updateImage');
		Route::get('/edituser', 'ProfileController@edituser')->name('user.edituser');
		Route::put('/updateuser/{id}', 'ProfileController@updateuser')->name('user.updateuser');
		Route::get('/editcontact', 'ProfileController@editcontact')->name('user.editcontact');
		Route::put('/updatecontact/{id}', 'ProfileController@updatecontact')->name('user.updatecontact');
		Route::get('/editpassword', 'ProfileController@editpassword')->name('user.editpassword');
		Route::put('/updatepassword/{id}', 'ProfileController@updatepassword')->name('user.updatepassword');
	});

});
