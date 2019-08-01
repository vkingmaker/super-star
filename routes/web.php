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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

Route::get('/subscription', 'SubscriptionController@index');

Route::post('/starrecords/videos', 'VideoController@store');

Route::get('/starrecords/musics', 'MusicController@index');

Route::post('/starrecords/musics', 'MusicController@store');

Route::get('/starrecords/photos', 'PhotoController@index');

Route::post('/starrecords/photos', 'PhotoController@store');

Route::delete('/starrecords/photos/{photo}', 'PhotoController@destroy');

Route::patch('/starrecords/photos/{photo}/like', 'PhotoController@update');

Route::post('/starrecords/tours', 'TourController@store');

Route::get('/starrecords/tours', 'TourController@index');

Route::get('/starrecords/videos', 'VideoController@index');

Route::patch('/starrecords/videos/{video}', 'VideoController@update');

Route::get('/starrecords/videos/{video}', 'VideoController@show');

Route::delete('/starrecords/videos/{video}', 'VideoController@destroy');

Route::post('/starrecords/videos/{video}/comment', 'ViewersFeedbackController@store');

Route::patch('/starrecords/musics/{music}/like', 'MusicController@update');

Route::post('/starrecords/subscription', 'CardSubscriptionController@store');

Route::get('/starrecords/subscription', 'CardSubscriptionController@create');

Route::delete('/starrecords/musics/{music}', 'MusicController@destroy');
});


Auth::routes();

Route::get('/starrecords', 'HomeController@index')->name('starrecords')->middleware('subscription');
