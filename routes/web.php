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

Route::get('/', 'AuthController@getLogin');
Route::get('auth/login', 'AuthController@getLogin');
Route::get('auth/logout', 'AuthController@logout');
Route::post('auth/login', 'AuthController@authenticate');
Route::get('auth/not-permis', 'AuthController@notPermis');
Route::get('image/delete/{filename}', 'ImageController@delete');
Route::post('file/uploads/{fileID}', 'FileController@fileUploads')->middleware('checkauth');
Route::post('file/uploads', 'FileController@uploads')->middleware('checkauth');
Route::post('image/uploads', 'ImageController@uploads')->middleware('checkauth');
Route::post('file/uploads-dinhkem', 'FileController@uploads_dinhkem')->middleware('checkauth');
Route::get('file/delete/{filename}', 'FileController@delete')->middleware('checkauth');
Route::get('file/download/{filename}', 'FileController@download')->middleware('checkauth');
Route::get('address/get/{id}', 'DMDiaChiController@getOptions')->middleware('checkauth');
Route::get('address/get/{id}/{id1}', 'DMDiaChiController@getOptions1')->middleware('checkauth');
Route::group(['prefix' => 'admin',  'middleware' => 'checkauth'], function(){
    Route::get('nam-hoc', 'RequestController@nam_hoc');
    Route::get('request-nam-hoc', 'RequestController@request_nam_hoc');
});
