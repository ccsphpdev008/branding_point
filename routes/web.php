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
//     return view('front');
// })->name('home');
// \Auth::loginUsingId(1);
// dd(\Auth::user()->toArray()['name']);
Route::get('/','FrontController@index')->name('home');
Route::post('/register','LoginController@registerSave')->name('register.save');
Route::post('/login','LoginController@loginCheck')->name('front.login.check');
Route::get('/logout','LoginController@logout')->name('front.logout');

Route::get('/profile/dashboard','ProfileController@dashboard')->name('profile.dashboard');
Route::get('/profile/edit','ProfileController@profileEdit')->name('profile.edit');
Route::post('/profile/edit','ProfileController@profileUpdate')->name('profile.update');
Route::get('/profile/myproductlist','ProfileController@myproductlist')->name('profile.myproductlist');

Route::get('/product/add','ProductController@index')->name('product.add');
Route::post('/product/add','ProductController@productSave')->name('product.save');
Route::get('/product/edit/{id}','ProductController@productEdit')->name('product.edit');
Route::get('/product/delete/{id}','ProductController@productDelete')->name('product.delete');
Route::post('/product/edit/{id}','ProductController@productUpdate')->name('product.update');
Route::get('/product/{id}/view','ProductController@view')->name('product.view');
Route::get('/product/list','ProductController@productList')->name('product.list');

Route::get('/product/image/{id}/add','ProductController@productImageView')->name('product.image.view');
Route::post('/product/image/{id}/add','ProductController@productImageSave')->name('product.image.save');
Route::post('/product/image/carousel/{id}/add','ProductController@productImageCarouselSave')->name('product.image.carousel.save');
Route::get('/product/image/{id}/remove','ProductController@productImageRemove')->name('product.image.remove');
Route::get('/product/image/carousel/{id}/remove','ProductController@productImageCarouselRemove')->name('product.image.carousel.remove');

Route::post('/product/{id}/review','FrontController@productReview')->name('product.review');

Route::post('/blog/{id}/review','FrontController@blogReview')->name('blog.review');

Route::get('/blog','BlogController@index')->name('blog');
Route::get('/blog/{id}/view','BlogController@view')->name('blog.view');

Route::get('/about','FrontController@about')->name('about');
Route::get('/contact','FrontController@contact')->name('contact');
Route::post('/contact','FrontController@contactSave')->name('contact.save');

Route::get('dropzone', 'DropzoneController@dropzone');
Route::post('dropzone/store', 'DropzoneController@dropzoneStore')->name('dropzone.store');

Route::get('/password/forgot','ForgotController@showForgetPasswordForm')->name('forget.password.get');
Route::post('/password/forget-password','ForgotController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('/password/reset-password/{id}','ForgotController@showResetPasswordForm')->name('reset.password.get');
Route::post('/password/reset-password','ForgotController@submitResetPasswordForm')->name('reset.password.post');