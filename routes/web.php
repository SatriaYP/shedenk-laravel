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

Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin')->name('login');

Route::group(['middleware'=>['auth']], function(){
        Route::get('/dashboard', 'DashboardController@getAll')->name('dashboard');
        Route::get('/kategori', 'KategoriController@getData')->name('kategori');
        Route::get('/produk', 'ProdukController@getData')->name('produk');
        Route::get('/riwayat', 'RiwayatController@getRiwayat')->name('riwayat');
        Route::get('/antrian', 'AntrianController@getAntrian')->name('antrian');
        Route::post('/antrian/store', 'AntrianController@store')->name('antrian.store');
        Route::post('/antrian/destroy', 'AntrianController@destroy')->name('antrian.destroy');
    
        //crud kategori
        Route::post('/kategori/update','KategoriController@update')->name('kategori.update');
        Route::post('/kategori/store','KategoriController@store')->name('kategori.store');
        Route::post('/kategori/destroy','KategoriController@destroy')->name('kategori.destroy');
    
        //crud produk
        Route::post('/produk/update','ProdukController@update')->name('produk.update');
        Route::post('/produk/store','ProdukController@store')->name('produk.store');
        Route::post('/produk/destroy','ProdukController@destroy')->name('produk.destroy');
    
        //crud profile
        Route::post('/profile','ProfileController@update')->name('profile.update');
    
        //logout
        Route::post('/logout', 'AuthController@logout')->name('logout');
    
});
Route::group(['middleware'=>['auth','superadmin']], function(){
    Route::get('/user', 'UserController@getData')->name('user');
    Route::get('/admin', 'AdminController@getAdmin')->name('admin');
    //crud user
    Route::post('/user/destroy','UserController@destroy')->name('user.destroy');
    //crud admin
    Route::post('/admin/update','AdminController@update')->name('admin.update');
    Route::post('/admin/store','AdminController@store')->name('admin.store');
    Route::post('/admin/destroy','AdminController@destroy')->name('admin.destroy');
});


