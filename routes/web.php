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

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function () {


    Route::get('/', 'HomeController@home')->name('home');

    Auth::routes();
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

    //---------------------Community-------------------------//

    Route::resource('community', 'CommunityController');

    Route::get('/community/{community}/restore', 'CommunityController@restore')->name('community.restore');

    //---------------------Follow-------------------------//
    Route::get('/community/{community}/follow/{user}', 'FollowerController@follow')->name('community.follow');
    Route::get('/community/{community}/unfollow/{user}', 'FollowerController@unfollow')->name('community.unfollow');
    //---------------------Follow-------------------------//

    //---------------------Community-------------------------//

    //---------------------Post-------------------------//
    Route::resource('post', 'PostController');

    Route::get('/post/{post}/restore', 'PostController@restore')->name('post.restore');
    //---------------------Like-------------------------//
    Route::get('/{post}/like', 'LikeController@like')->name('post.like');
    Route::get('/{post}/unlike', 'LikeController@unlike')->name('post.unlike');
    //---------------------Like-------------------------//

    //---------------------Comment-------------------------//
    Route::post('/comment/{post}/store', 'CommentController@store')->name('comment.store');
    Route::get('/comment/{comment}/edit', 'CommentController@edit')->name('comment.edit');
    Route::post('/comment/{comment}/update', 'CommentController@update')->name('comment.update');
    Route::get('/comment/{comment}/delete', 'CommentController@destroy')->name('comment.destroy');
    Route::get('/comment/{comment}/restore', 'CommentController@restore')->name('comment.restore');
    //---------------------Comment-------------------------//

    //---------------------Post-------------------------//
    Route::group([
        'prefix' => 'Notification',
    ], function () {
        Route::get('/{id}/mark-as-read', 'NotificationController@readAt')->name('notification.read');

        Route::get('/mark-all-as-read', 'NotificationController@readAll')->name('notification.read.all');

        Route::get('/notifications/all', 'NotificationController@showAllNotifications')->name('notifications.all');
    });

    Route::group([
        'prefix' => 'cheat-sheet',
    ], function () {
        Route::get('/homepage', 'CheatController@index')->name('cheat.index');
    });
});
