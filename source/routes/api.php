<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Api\AuthController@login')->name('login');
Route::post('/register', 'Api\AuthController@register')->name('register');
Route::post('/edit_account', 'Api\AuthController@edit_account')->name('edit_account');
Route::post('/update_account', 'Api\AuthController@update_account')->name('update_account');

Route::post('/getGallery', 'Api\KeluargaController@getGallery')->name('getGallery');
Route::post('/uploadGallery', 'Api\KeluargaController@uploadGallery')->name('uploadGallery');
Route::post('/detailGallery', 'Api\KeluargaController@detailGallery')->name('detailGallery');
Route::get('/getPohonKeluarga', 'Api\KeluargaController@getPohonKeluarga')->name('getPohonKeluarga');
Route::get('/getDetailAnggota/{id}', 'Api\KeluargaController@getDetailAnggota')->name('getDetailAnggota');
