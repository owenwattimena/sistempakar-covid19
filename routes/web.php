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

/**
 * ------------------------------------------------------------------------
 * Login Route
 * ------------------------------------------------------------------------
 * 
 */
Route::group(['middleware' => ['guest']], function () { 
    Route::get('/login', 'Auth\AuthController@login');
    Route::post('/login', 'Auth\AuthController@post_login')->name('login');
});
/**--------------------------------------------------------------------- */

Route::get('/', function () {
    return view('apps/pages/main');
});

Route::get('/tentang', 'TentangController@index');
Route::get('/diagnosa', 'DiagnosaController@index')->name('diagnosa');
Route::get('/diagnosa/all', 'DiagnosaController@get')->name('diagnosa_all'); //return JSON


/**
 * ------------------------------------------------------------------------
 * Route for Admin
 * ------------------------------------------------------------------------
 *  - / (dashboard)
 *  - tentang
 *  - gejala
 */
Route::group([ 'middleware' => ['auth']], function(){
    
    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

    Route::group(['prefix' => 'admin'], function () {
        
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

        Route::get('/tentang', 'Admin\TentangController@index')->name('tentang');
        Route::put('/tentang', 'Admin\TentangController@update')->name('update_tentang');

        Route::group(['prefix' => 'gejala'], function () { 
            Route::get('/', 'Admin\GejalaController@index')->name('gejala');
            Route::post('/', 'Admin\GejalaController@create')->name('create_gejala');
            Route::put('/ubah/{id}', 'Admin\GejalaController@update');
            Route::delete('/hapus/{id}', 'Admin\GejalaController@destroy')->name('destroy_gejala');
        });
    });
});
/**--------------------------------------------------------------------- */