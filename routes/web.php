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
Route::get('/login', 'AuthController@login')->middleware('guest')->name('login');
Route::get('/register', 'AuthController@register')->middleware('guest')->name('register');
Route::get('/logout', 'AuthController@logout');
Route::post('/postLogin', 'AuthController@postLogin');
Route::post('/postRegister', 'AuthController@postRegister');

Route::group(['middleware' => ['auth', 'roleCheck:admin,user']], function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/pemasukan', 'PemasukanController@index');
    Route::post('/pemasukan/add', 'PemasukanController@add');
    Route::get('/pemasukan/{id}/delete', 'PemasukanController@delete');
    Route::match(array('GET', 'POST'), '/pemasukan/filter', 'PemasukanController@filter');
    Route::match(array('GET', 'POST'), '/pemasukan/print', 'PemasukanController@print');

    Route::get('/pengeluaran', 'PengeluaranController@index');
    Route::post('/pengeluaran/add', 'PengeluaranController@add');
    Route::get('/pengeluaran/{id}/delete', 'PengeluaranController@delete');
    Route::match(array('GET', 'POST'), '/pengeluaran/filter', 'PengeluaranController@filter');
    Route::match(array('GET', 'POST'), '/pengeluaran/print', 'PengeluaranController@print');

    Route::get('/wishlist', 'WishlistController@index');
    Route::post('wishlist/add', 'WishlistController@add');
    Route::get('/wishlist/{id}/edit', 'WishlistController@edit');
    Route::post('/wishlist/{id}/postEdit', 'WishlistController@postEdit');
    Route::get('/wishlist/{id}/delete', 'WishlistController@delete');
    Route::match(array('GET', 'POST'), '/wishlist/filter', 'WishlistController@filter');
    Route::match(array('GET', 'POST'), '/wishlist/print', 'WishlistController@print');

    Route::get('/hutang', 'HutangController@index');
    Route::post('/hutang/add', 'HutangController@add');
    Route::get('/hutang/{id}/delete', 'HutangController@delete');
    Route::match(array('GET', 'POST'), '/hutang/filter', 'HutangController@filter');
    Route::match(array('GET', 'POST'), '/hutang/print', 'HutangController@print');

    Route::get('/user/changepassword', 'UserController@changepassword');
    Route::post('/user/postchangepassword', 'UserController@postchangepassword');
});

Route::group(['middleware' => ['auth', 'roleCheck:admin']], function () {
    Route::get('/admin/listuser', 'AdminController@listuser');
    Route::get('/admin/user/{id}/manage', 'AdminController@manageuser');
    Route::post('/admin/user/{id}/postManage', 'AdminController@postmanageuser');
});
