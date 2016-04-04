<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::resource('tweet', 'TweetController');
//Route::controller('auth', 'Auth\AuthController');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', function() {
  Auth::logout();
  return Redirect::to('auth/login');
  //'Auth\AuthController@getLogout');
});
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//follow

//Route::get('follow/add/{id}', 'FollowController@add');
Route::get('follow/add/{id}', 'FollowController@checkFollow');
Route::get('follow/list', 'FollowController@followList');
Route::get('follower/list', 'FollowController@followerList');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*
Route::group(['middleware' => ['web']], function () {
    //
});
 */
