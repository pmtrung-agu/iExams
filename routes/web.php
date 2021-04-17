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
    Route::get('/', 'AuthController@admin');
    Route::group(['prefix' => 'danh-muc',  'middleware' => 'role:Admin,Manager'], function(){
        Route::get('nam-hoc', 'RequestController@nam_hoc');
        Route::get('request-nam-hoc', 'RequestController@request_nam_hoc');
        Route::get('request-nam-hoc-option', 'RequestController@request_nam_hoc_option');
        Route::get('danh-sach-hoc-sinh', 'RequestController@danh_sach_hoc_sinh');
        Route::get('request-danh-sach-hoc-sinh', 'RequestController@request_danh_sach_hoc_sinh');
        Route::get('mon-hoc', 'RequestController@mon_hoc');
        Route::get('request-mon-hoc', 'RequestController@request_mon_hoc');

        Route::get('phong-thi', 'DMPhongThiController@index')->middleware('role:Admin,Manager');
        Route::get('phong-thi/add', 'DMPhongThiController@add')->middleware('role:Admin,Manager');
        Route::post('phong-thi/create', 'DMPhongThiController@create')->middleware('role:Admin,Manager');
        Route::get('phong-thi/edit/{id}', 'DMPhongThiController@edit')->middleware('role:Admin,Manager');
        Route::post('phong-thi/update', 'DMPhongThiController@update')->middleware('role:Admin,Manager');
        Route::get('phong-thi/delete/{id}', 'DMPhongThiController@delete')->middleware('role:Admin,Manager');

        Route::get('buoi-thi', 'DMBuoiThiController@index')->middleware('role:Admin,Manager');
        Route::get('buoi-thi/add', 'DMBuoiThiController@add')->middleware('role:Admin,Manager');
        Route::post('buoi-thi/create', 'DMBuoiThiController@create')->middleware('role:Admin,Manager');
        Route::get('buoi-thi/edit/{id}', 'DMBuoiThiController@edit')->middleware('role:Admin,Manager');
        Route::post('buoi-thi/update', 'DMBuoiThiController@update')->middleware('role:Admin,Manager');
        Route::get('buoi-thi/delete/{id}', 'DMBuoiThiController@delete')->middleware('role:Admin,Manager');
    });

    Route::get('danh-so-bao-danh', 'DanhSachHocSinhController@list')->middleware('role:Admin,Manager');

    Route::get('user', 'UserController@list')->middleware('role:Admin');
    Route::get('user/change-password', 'UserController@change_password')->middleware('role:Admin');
    Route::post('user/update-password', 'UserController@update_password')->middleware('role:Admin');
    Route::get('user/add', 'UserController@add')->middleware('role:Admin');
    Route::post('user/create', 'UserController@create')->middleware('role:Admin');
    Route::get('user/edit/{id}', 'UserController@edit')->middleware('role:Admin');
    Route::post('user/update', 'UserController@update')->middleware('role:Admin');
    Route::get('user/delete/{id}', 'UserController@delete')->middleware('role:Admin');

    Route::get('dia-chi/get/{id}', 'DMDiaChiController@getOptions');
    Route::get('dia-chi/get/{id}/{id1}', 'DMDiaChiController@getOptions1');
});
