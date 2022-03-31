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

Route::get('/clear-all', function(){
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    dd('done');
});

Route::get('/migrate/fresh', function(){
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    \Artisan::call('db:seed');
    dd('done');
});

$adminPath = 'Admin';
Route::group(['prefix'=>'backoffice'], function () use ($adminPath) {
    
    Route::get('/login', $adminPath.'\LayoutController@login')->name('login');
    Route::post('/login', $adminPath.'\LayoutController@loginCheck')->name('login.check');
    
    Route::get('/password/forgot', $adminPath.'\LayoutController@forgot')->name('forgot');
    Route::post('/password/forgot', $adminPath.'\LayoutController@forgotPassword')->name('ajax.password.forgot');
    Route::get('/password/reset/{id}', $adminPath.'\LayoutController@passwordReset')->name('password.reset');
    Route::post('/password/reset', $adminPath.'\LayoutController@passwordResetPost')->name('ajax.reset.password');
    
    Route::get('/about',  $adminPath.'\UserInfoController@about')->name('admin.about');
    Route::get('/contact',  $adminPath.'\UserInfoController@contact')->name('admin.contact');
    Route::post('/ajax/contact', $adminPath.'\UserInfoController@addContact')->name('ajax.contact');
    
    Route::group(['as'=>'admin.'], function () use ($adminPath) {
        Route::get('/front', $adminPath.'\LayoutController@front')->name('home');

        Route::group(['middleware'=>['auth:admin']], function () use ($adminPath) {
            Route::get('/', $adminPath.'\LayoutController@home')->name('home');
            Route::get('/dashboard', $adminPath.'\LayoutController@dashboard')->name('dashboard');
            Route::get('/logout', $adminPath.'\LayoutController@logout')->name('logout');

            Route::get('user/profile', $adminPath.'\UserInfoController@profile')->name('user.profile');
            Route::post('user/profile', $adminPath.'\UserInfoController@profileUpdate')->name('user.profile.update');

            Route::get('common/setting', $adminPath.'\UserInfoController@commonSetting')->name('common.setting');
            Route::post('common/setting', $adminPath.'\UserInfoController@commonSettingUpdate')->name('common.setting.update');
            Route::post('common/setting/delete', $adminPath.'\UserInfoController@commonSettingDelete')->name('common.setting.delete');

            Route::get('roles/{role}/delete', $adminPath.'\RolesController@destroy')->name('roles.delete');
            Route::resource('roles', $adminPath.'\RolesController');

            Route::get('category/{category}/delete', $adminPath.'\CategoryController@destroy')->name('category.delete');
            Route::resource('category', $adminPath.'\CategoryController');

            Route::get('country/{country}/delete', $adminPath.'\CountryController@destroy')->name('country.delete');
            Route::resource('country', $adminPath.'\CountryController');
            
            Route::get('state/{state}/delete', $adminPath.'\StateController@destroy')->name('state.delete');
            Route::resource('state', $adminPath.'\StateController');
            
            Route::get('city/{city}/delete', $adminPath.'\CityController@destroy')->name('city.delete');
            Route::resource('city', $adminPath.'\CityController');
            
            Route::get('blog/{blog}/delete', $adminPath.'\BlogController@destroy')->name('blog.delete');
            Route::resource('blog', $adminPath.'\BlogController');
            
            Route::get('banner/{banner}/delete', $adminPath.'\BannerController@destroy')->name('banner.delete');
            Route::resource('banner', $adminPath.'\BannerController');
            
            Route::get('howitworks/{howitworks}/delete', $adminPath.'\HowItWorksController@destroy')->name('howitworks.delete');
            Route::resource('howitworks', $adminPath.'\HowItWorksController');
            
            Route::get('product/{product}/delete', $adminPath.'\ProductController@destroy')->name('product.delete');
            Route::get('product/{id}/image', $adminPath.'\ProductController@customImage')->name('product.image');
            Route::post('product/{product}/image', $adminPath.'\ProductController@customImageSave')->name('product.image.store');
            Route::get('product/{image}/image/delete', $adminPath.'\ProductController@customImageDelete')->name('product.image.delete');
            Route::resource('product', $adminPath.'\ProductController');
            
            Route::get('user_master/{user_master}/delete', $adminPath.'\UserMasterController@destroy')->name('user_master.delete');
            Route::get('login_as_user/{id}', $adminPath.'\LayoutController@loginAsUser')->name('login_as_user');
            Route::resource('user_master', $adminPath.'\UserMasterController');

            Route::get('/log', $adminPath.'\LogReaderController@getIndex')->name('logs');
            Route::get('/log/api_user', $adminPath.'\LogReaderController@getLogUsers')->name('logs.users');
            Route::get('/log/api_route_data', $adminPath.'\LogReaderController@getLogData')->name('logs.data');
            Route::get('/log/api_route_date', $adminPath.'\LogReaderController@getLogs')->name('logs.get');
            Route::get('/log/api_route_delete', $adminPath.'\LogReaderController@postDelete')->name('logs.delete');

            Route::post('/position/save', $adminPath.'\LayoutController@positionSave')->name('position.save');
        });
    });
});
