<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/login', 'Auth\SMAuthController@index');
Route::get('/sm_login', 'Auth\SMAuthController@redirectToProvider');
Route::get('/sm_login/callback', 'Auth\SMAuthController@handleProviderCallback');

Route::get('/logout', 'Auth\SMAuthController@logout');

Route::get('/', 'VideoController@index')->name('home');
Route::post('/video/category', 'VideoController@searchCategory');
Route::get('/video/{video_id}/view', 'VideoController@view');

Route::get('/video/categories', 'VideoController@getCategories');

/**--------------------------------------
|  USER ROUTES
----------------------------------------*/
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {

    Route::get('/videos', 'VideoController@userUploadedVideos');

    Route::get('/edit', 'UserController@edit');

    Route::post('/{user_id}/edit', 'UserController@update');
});

Route::group(['prefix' => 'videos', 'middleware' => 'auth'], function () {

    Route::get('/create', 'VideoController@create');

    Route::post('/create', 'VideoController@store');
});
