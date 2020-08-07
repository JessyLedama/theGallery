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
Route::get('/edit-profile-picture', 'FlyersController@editPic');
Route::post('/update-profile-picture', 'FlyersController@updatePic');

Route::resource('flyers', 'FlyersController');

Route::get('{area}', 'FlyersController@show');

Route::post('{area}/photos', ['as' => 'store_photo_path', 'uses' => 'FlyersController@addPhoto']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('download', function(){
        
        //fetching the GET request
        $path = request('f');

        //get file's extension
        $extension = pathinfo($path, PATHINFO_EXTENSION);

        //don't download these
        $blocked = ['php', 'htaccess'];

        //if the requested file is not in the blocked array
        if (! in_array($extension, $blocked)) {
            //download the file
            return response()->download($path);
        }
    });
});
