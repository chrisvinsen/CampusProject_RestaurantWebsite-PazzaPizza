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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('','CMSController@home')->name('home');
// Route::get('','Authentication@index')->name('home');


Route::group(['prefix'=>'menu'], function(){
	Route::get('','CMSController@menu')->name('menu');
	Route::get('/{product}','CMSController@details')->name('menu.details');
	Route::post('/review/store','ProductReviewController@store')->name('menu.review.store');
	Route::group(['prefix'=>'order'], function(){
		Route::group(['prefix'=>'cart'], function(){
			Route::get('','CartController@index')->name('menu.order.cart');
	    	Route::post('/store','CartController@store')->name('menu.order.cart.store');
	    	Route::post('/update','CartController@update')->name('menu.order.cart.update');
	    	Route::get('{cart}/delete','CartController@destroy')->name('menu.order.cart.destroy');
	    	Route::get('/delete-all','CartController@destroy')->name('menu.order.cart.destroy.all');
		});
		Route::group(['prefix'=>'checkout'], function(){
			Route::get('','TransactionController@index')->name('menu.order.checkout');
	    	Route::post('/store','TransactionController@store')->name('menu.order.checkout.store');
		});
		Route::get('/confirmation/{transaction}','TransactionController@confirmation')->name('menu.order.confirmation');
		Route::get('/history','TransactionController@history')->name('menu.order.history');
	});
});

Route::get('/aboutus','CMSController@aboutus')->name('aboutus');
Route::get('/contact','CMSController@contact')->name('contact');

Route::group(['prefix'=>'account'], function(){
	Route::get('','Authentication@index')->name('account');
	Route::group(['prefix'=>'profile'], function(){
		Route::get('{modelUser}','UserProfileController@index')->name('account.profile');
		Route::get('{modelUser}/edit','UserProfileController@edit')->name('account.profile.edit');
		Route::post('{modelUser}/update','UserProfileController@update')->name('account.profile.update');
	});
    Route::get('/register','Authentication@register')->name('account.register');
    Route::post('/registerPost', 'Authentication@registerPost')->name('account.registerPost');
    Route::get('/login','Authentication@login')->name('account.login');
    Route::post('/loginPost', 'Authentication@loginPost')->name('account.loginPost');
	Route::get('/logout','Authentication@logout')->name('account.logout');

	Route::group(['prefix'=>'favorite'], function(){
    	Route::get('','UserFavoriteController@index')->name('account.favorite');
    	Route::post('store','UserFavoriteController@store')->name('account.favorite.store');
    	Route::get('{userFavorite}/delete','UserFavoriteController@destroy')->name('account.favorite.destroy');
	});
});


Route::group(['prefix'=>'panel'], function(){
	Route::get('', 'AdminController@index')->name('panel');

	Route::group(['prefix' => 'product'], function () {
	    Route::get('', 'AdminController@products')->name('panel.product');
	    Route::get('/add', 'ProductController@add')->name('panel.product.add');
	    Route::post('/addPost', 'ProductController@addPost')->name('panel.product.addPost');
	    Route::get('/detail/{product}', 'ProductController@detail')->name('panel.product.detail');
	    Route::get('/update/{product}', 'ProductController@update')->name('panel.product.update');
	    Route::post('/updatePost/{product}', 'ProductController@updatePost')->name('panel.product.updatePost');
	    Route::get('/delete/{product}', 'ProductController@delete')->name('panel.product.delete');
	});

	Route::group(['prefix' => 'user'], function () {
	    Route::get('', 'AdminController@users')->name('panel.user');
	    Route::get('/create', 'AdminController@user_create')->name('panel.user.create');
	    Route::post('/store', 'AdminController@user_store')->name('panel.user.store');
	    Route::get('/delete/{modelUser}', 'AdminController@user_destroy')->name('panel.user.destroy');
	});
});



// Route::group(['prefix'=>'contact'], function(){
// 	Route::get('','CMSController@contact')->name('contact');
// 	Route::get('/career','CMSController@career')->name('contact.career');
// 	Route::get('/faq','CMSController@faq')->name('contact.faq');
// });
