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
    return redirect(url('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin-access'], 'as'=>'admin'], function() {

    //Dashboard
    Route::get('/', 'Admin\DashboardController@index')->name('.dashboard');

    //Member
    Route::group(['prefix' => 'member', 'as'=>'.member'], function() {
        Route::get('/', 'Admin\UserController@member')->name('.manage');
        Route::get('/create', 'Admin\UserController@create_member')->name('.create');
        Route::post('/create', 'Admin\UserController@store_member')->name('.store');
        Route::get('/edit/{id}', 'Admin\UserController@edit_member')->name('.edit');
        Route::post('/edit/{id}', 'Admin\UserController@update_member')->name('.update');
    });

});

//Keluarga
Route::group(['prefix' => 'member', 'middleware' => ['auth','role:keluarga-access'], 'as'=>'keluarga'], function() {

    //Dashboard
    Route::get('/', 'Keluarga\DashboardController@index')->name('.dashboard');
    Route::get('/print', 'Keluarga\DashboardController@print_tree')->name('.print');
    Route::get('/addparent/{id}', 'Keluarga\DashboardController@addparent')->name('.addparent');
    Route::post('/addparent/{id}', 'Keluarga\DashboardController@storeaddparent')->name('.storeaddparent');
    Route::get('/addwedding/{id}', 'Keluarga\DashboardController@addwedding')->name('.addwedding');
    Route::post('/storeaddwedding/{id}', 'Keluarga\DashboardController@storeaddwedding')->name('.storeaddwedding');

    //Anggota
    Route::group(['prefix' => 'anggota', 'as'=>'.anggota'], function() {
        Route::get('/', 'Keluarga\AnggotaController@index')->name('.manage');
        Route::get('/create', 'Keluarga\AnggotaController@create')->name('.create');
        Route::post('/create', 'Keluarga\AnggotaController@store')->name('.store');
        Route::get('/edit/{id}', 'Keluarga\AnggotaController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Keluarga\AnggotaController@update')->name('.update');
    });

    //Setting
    Route::group(['prefix' => 'setting', 'as'=>'.setting'], function() {
        Route::get('/', 'Keluarga\KeluargaController@edit')->name('.create');
        Route::post('/', 'Keluarga\KeluargaController@update')->name('.store');
    });

    //Profile
    Route::group(['prefix' => 'profile', 'as'=>'.profile'], function() {
        Route::get('/', 'Keluarga\ProfileController@edit')->name('.edit');
        Route::post('/', 'Keluarga\ProfileController@update')->name('.update');
    });
});