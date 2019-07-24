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

Route::post('/starrecords/videos', 'VideoController@store');

Route::post('/starrecords/musics', 'MusicController@store');

Route::post('/starrecords/photos', 'PhotoController@store');

Route::post('/starrecords/tours', 'TourController@store');

Route::patch('/starrecords/videos/{video}', 'VideoController@update');

Route::delete('/starrecords/videos/{video}', 'VideoController@destroy');

Route::post('/starrecords/videos/{video}/comment', 'ViewersFeedbackController@store');

Route::patch('/starrecords/musics/{music}/like', 'MusicController@update');

Route::delete('/starrecords/musics/{music}', 'MusicController@destroy');


