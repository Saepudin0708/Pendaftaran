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

Route::group(['middleware' => ['IsAdmin']], function () {

    Route::get('/admin', [
        'uses'      => '\App\Http\Controllers\AdminController@getHello',
        'as'        => 'admin',
    ]);

});


Route::get('/daftar', [
    'uses'  => '\App\Http\Controllers\PendaftaranController@getPendaftaran',
]);

Route::post('/daftar', [
    'uses'  => '\App\Http\Controllers\PendaftaranController@postPendaftaran',
    'as' => 'daftar_post'
]);

Route::post('/daftar/tmpupload', [
    'uses'  => '\App\Http\Controllers\PendaftaranController@postUploadToTemporary'
]);

Route::get('/daftaredit/{id}', [
    'uses'  => '\App\Http\Controllers\PendaftaranController@getPendaftaranEdit',
]);

Route::patch('/daftaredit/{id}', [
    'uses'  => '\App\Http\Controllers\PendaftaranController@patchPendaftaranEdit',
    'as' => 'daftaredit_patch'
]);
