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

Route::get('/diagnosa', 'DiagnosaController@index')->name('diagnosa');
Route::get('/diagnosa/all', 'DiagnosaController@get')->name('diagnosa_all');

Route::group([ 'middleware' => ['auth']], function(){
    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
    Route::get('/admin', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('/admin/gejala', 'Admin\GejalaController@index')->name('gejala');
    Route::post('/admin/gejala', 'Admin\GejalaController@create')->name('create_gejala');
    Route::put('/admin/gejala/ubah/{id}', 'Admin\GejalaController@update');
    Route::delete('/admin/gejala/hapus/{id}', 'Admin\GejalaController@destroy')->name('destroy_gejala');
});