<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    Auth::routes();
    Route::get('/', 'HomeController@home')->name('home');


    Route::group([
        'prefix' => 'laravel',
    ], function () {

        Route::get('/homepage', 'HomeController@laravel')->name('laravel');
        Route::get('/Installation', 'LaravelController@installation')->name('laravel.installation');
        Route::get('/basic', 'LaravelController@basic')->name('laravel.basic');
        Route::get('/route', 'LaravelController@route')->name('laravel.route');
        Route::get('/middleware', 'LaravelController@thismiddleware')->name('laravel.middleware');

        Route::get('/csrf', 'LaravelController@thiscsrf')->name('laravel.csrf');
        Route::post('/with-csrf', 'LaravelController@csrfpost')->name('laravel.csrf.post');
        Route::post('/without-csrf', 'LaravelController@nonecsrfpost')->name('laravel.nonecsrf.post');

        Route::get('/controller', 'LaravelController@controller')->name('laravel.controller');

        Route::get('/request', 'LaravelController@request')->name('laravel.request');
        
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

     //---------------------Like-------------------------//
     Route::get('/{comment}/like', 'LikeController@likeComment')->name('comment.like');
     Route::get('/{comment}/unlike', 'LikeController@unlikeComment')->name('comment.unlike');
     //---------------------Like-------------------------//
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

        //**********************For User *************************************/
        Route::get('/user', 'CheatController@user')->name('cheat.user');
        Route::post('/user/{user}/update', 'CheatController@userupdate')->name('cheat.user.update');
        Route::get('/user/{user}/destroy', 'CheatController@userdestroy')->name('cheat.user.destroy');
        Route::get('/user/{user}/restore', 'CheatController@userrestore')->name('cheat.user.restore');
        //**********************For User *************************************/

        //**********************For Profile *************************************/
        Route::get('/profile', 'CheatController@profile')->name('cheat.profile');
        Route::post('/profile/store', 'CheatController@profilestore')->name('cheat.profile.store');
        Route::post('/profile/{profile}/update', 'CheatController@profileupdate')->name('cheat.profile.update');
        //**********************For Profile *************************************/

        //**********************For Community *************************************/
        Route::get('/community', 'CheatController@community')->name('cheat.community');
        Route::post('/community/store', 'CheatController@communitystore')->name('cheat.community.store');
        Route::get('/community/{community}/edit', 'CheatController@communityedit')->name('cheat.community.edit');
        Route::post('/community/{community}/update', 'CheatController@communityupdate')->name('cheat.community.update');
        Route::get('/community/{community}/delete', 'CheatController@communitydestroy')->name('cheat.community.destroy');
        Route::get('/community/{community}/restore', 'CheatController@communityrestore')->name('cheat.community.restore');
        //**********************For Community *************************************/

        //**********************For Post *************************************/
        Route::get('/post', 'CheatController@post')->name('cheat.post');
        Route::post('/post/store', 'CheatController@poststore')->name('cheat.post.store');
        Route::get('/post/{post}/edit', 'CheatController@postedit')->name('cheat.post.edit');
        Route::post('/post/{post}/update', 'CheatController@postupdate')->name('cheat.post.update');
        Route::get('/post/{post}/delete', 'CheatController@postdestroy')->name('cheat.post.destroy');
        Route::get('/post/{post}/restore', 'CheatController@postrestore')->name('cheat.post.restore');
        //**********************For Community *************************************/

        //**********************For Comment *************************************/
        Route::get('/comment', 'CheatController@comment')->name('cheat.comment');
        Route::post('/comment/store', 'CheatController@commentstore')->name('cheat.comment.store');
        Route::get('/comment/{comment}/edit', 'CheatController@commentedit')->name('cheat.comment.edit');
        Route::post('/comment/{comment}/update', 'CheatController@commentupdate')->name('cheat.comment.update');
        Route::get('/comment/{comment}/delete', 'CheatController@commentdestroy')->name('cheat.comment.destroy');
        Route::get('/comment/{comment}/restore', 'CheatController@commentrestore')->name('cheat.comment.restore');
        //**********************For Comment *************************************/
    });
});
