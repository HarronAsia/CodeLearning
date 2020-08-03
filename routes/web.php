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

Route::get('/', 'HomeController@home')->name('home');


Route::group([
    'prefix' => 'laravel',
], function () {
    Route::get('/homepage', 'HomeController@laravel')->name('laravel');
    Route::get('/Installation', 'LaravelController@installation')->name('laravel.installation');
    Route::get('/basic', 'LaravelController@basic')->name('laravel.basic');
    Route::get('/route', 'RouteController@route')->name('laravel.route');
    Route::get('/middleware', 'MiddlewareController@thismiddleware')->name('laravel.middleware');
});


