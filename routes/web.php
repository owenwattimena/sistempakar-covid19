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

Route::get('/info/{info}', 'InfoController@index');
Route::get('/diagnosa', ['as' => 'diagnosa' ,'uses' =>'DiagnosaController@index']);
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

        Route::get('/info', 'Admin\InfoController@index')->name('info');
        Route::get('/info/{info}/edit', 'Admin\InfoController@edit')->name('edit_info');
        Route::put('/info/{info}/update', 'Admin\InfoController@update')->name('update_info');
        
        // Route::get('/pencegahan', 'Admin\PencegahanController@index')->name('pencegahan');
        // Route::put('/pencegahan', 'Admin\PencegahanController@update')->name('update_pencegahan');

        Route::group(['prefix' => 'gejala'], function () { 
            Route::get('/', 'Admin\GejalaController@index')->name('gejala');
            Route::post('/', 'Admin\GejalaController@create')->name('create_gejala');
            Route::put('/ubah/{id}', 'Admin\GejalaController@update');
            Route::delete('/hapus/{id}', 'Admin\GejalaController@destroy')->name('destroy_gejala');
        });
    });
});
/**--------------------------------------------------------------------- */