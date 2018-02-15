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
Route::get('/','homeController@home');

Route::post('/search','homeController@search');

Route::get('/kategori/{id}','homeController@kategori');

Route::post('/order','homeController@order');

Route::get('/order/list','homeController@listOrder');

Route::post('/order/cancel','homeController@cancel');

Route::post('/bayar/saldo','bayarController@bayarSaldo');

Route::get('/bayar/transfer/{id}','bayarController@bayarTransfer');

Route::post('/konfirmasi/upload','bayarController@upload');

Route::get('/konfirmasi/res','bayarController@res');

Route::get('/isiSaldo','homeController@isiSaldo');

Route::get('/isiSaldo/list','dataUsersController@listSaldo');

Route::post('/isiSaldo/add','dataUsersController@addSaldo');

Route::post('/isiSaldo/konfirmasi','homeController@konfirmasiSaldo');

Route::post('/konfirmasi/diterima','pembayaranController@diterima');

Route::post('/konfirmasi/diterimaUser','homeController@diterimaUser');

Route::get('/orderPdf','pdfController@downloadPDF');

Route::get('/register', 'registerController@showRegister');

Route::post('/sendRegister', 'registerController@sendRegister');

Route::get('/login', 'loginController@getLogin')->name('login');

Route::post('/postLogin', 'loginController@postLogin');

Route::get('/logout', function(){
  Auth::logout();
  return view('login.formLogin');
});

Route::get('/halamanKhusus',function ()
{
  return view('halamanKhusus');
});


Route::get('/admin','adminController@getAdmin');


Route::get('/admin/produk','produkController@getProduk');

Route::post('/admin/produk/add','produkController@addProduk');

Route::post('/admin/produk/edit/','produkController@editProduk');

Route::get('/admin/produk/{id}','produkController@deleteProduk');


Route::get('/admin/kategori','kategoriController@getKategori');

Route::post('/admin/kategori/add','kategoriController@addKategori');

Route::post('/admin/kategori/edit','kategoriController@editKategori');

Route::get('/admin/kategori/{id}','kategoriController@deleteKategori');


Route::get('/admin/users','dataUsersController@getUsers');

Route::post('/admin/users/edit','dataUsersController@editUser');


Route::get('/admin/order','orderController@getOrder');

Route::get('/admin/pembayaran','pembayaranController@getPembayaran');

Route::post('/admin/pembayaran/edit','pembayaranController@editPembayaran');

Route::get('/admin/pembayaran/{id}','pembayaranController@deletePembayaran');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
