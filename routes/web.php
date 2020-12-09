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
    return view('home.index');
});
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@register')->name('register');
Route::get('/logout', 'AuthController@logout');
Route::post('/postLogin', 'AuthController@postLogin');
Route::post('/postRegister', 'AuthController@postRegister');

Route::group(['middleware' => ['auth', 'roleCheck:admin,user']], function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/pemasukan', 'PemasukanController@index');
    Route::post('/pemasukan/add', 'PemasukanController@add');
    Route::get('/pemasukan/{id}/delete', 'PemasukanController@delete');

    Route::get('/pengeluaran', 'PengeluaranController@index');
    Route::post('/pengeluaran/add', 'PengeluaranController@add');
    Route::get('/pengeluaran/{id}/delete', 'PengeluaranController@delete');
});
