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

Auth::routes(); 

Route::get('/', 'FlyersController@index');
Route::get('/listings', 'FlyersController@index');
Route::get('/profile', 'FlyersController@profile');
Route::get('/edit-profile', 'FlyersController@editProfile');
Route::post('/updateProfile', 'FlyersController@updateProfile');

Route::resource('flyers', 'FlyersController');

Route::get('{area}', 'FlyersController@show');

Route::post('{area}/photos', ['as' => 'store_photo_path', 'uses' => 'FlyersController@addPhoto']);
