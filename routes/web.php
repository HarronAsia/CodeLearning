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

Auth::routes();
Route::get('/', 'HomeController@home')->name('home');


Route::group([
    'prefix' => 'laravel',
], function () {

    Route::get('/homepage', 'HomeController@laravel')->name('laravel');
    Route::get('/Installation', 'LaravelController@installation')->name('laravel.installation');
    Route::get('/basic', 'LaravelController@basic')->name('laravel.basic');
    Route::get('/route', 'RouteController@route')->name('laravel.route');
    Route::get('/middleware', 'MiddlewareController@thismiddleware')->name('laravel.middleware');

    Route::get('/csrf', 'CSRFController@thiscsrf')->name('laravel.csrf');
    Route::post('/with-csrf', 'CSRFController@csrfpost')->name('laravel.csrf.post');
    Route::post('/without-csrf', 'CSRFController@nonecsrfpost')->name('laravel.nonecsrf.post');

    Route::get('/controller', 'ControllerControllers@controller')->name('laravel.controller');

    Route::get('/request', 'RequestController@request')->name('laravel.request');
});

//--------Profile------------------------//

Route::resource('profile', 'UserController');
Route::post('/profile/{profile}/confirm', 'UserController@confirm')->name('profile.confirm');

Route::resource('information', 'ProfileController');
Route::post('/information/{information}/confirm', 'ProfileController@confirm')->name('information.confirm');
//--------Profile------------------------//
