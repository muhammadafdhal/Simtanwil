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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Json Daerah
Route::prefix('daerah')->group(function () {
    Route::get('kabupaten/{id}', 'DaerahController@getkabupaten');
    Route::get('kecamatan/{id}', 'DaerahController@getkecamatan');
    Route::get('kelurahan/{id}', 'DaerahController@getkelurahan');
  });

Route::prefix('provinsi')->group(function () {
    Route::get('', 'ProvinsiController@index');
    Route::get('tambah','ProvinsiController@create');
    Route::post('tambah/save', 'ProvinsiController@store');
    Route::get('edit/{id_provinsi}','ProvinsiController@edit');
    Route::patch('edit/{id_provinsi}/save', 'ProvinsiController@update');
    Route::delete('delete/{id_provinsi}', 'ProvinsiController@destroy');

});

Route::prefix('arsip')->group(function () {
    Route::get('', 'ArsipController@index');
    Route::get('tambah','ArsipController@create');
    Route::post('tambah/save', 'ArsipController@store');
    Route::get('detail/{ap_id}', 'ArsipController@show');
    Route::get('edit/{ap_id}','ArsipController@edit');
    Route::patch('edit/{ap_id}/save', 'ArsipController@update');
    Route::delete('delete/{ap_id}', 'ArsipController@destroy');

});

Route::prefix('kabkota')->group(function () {
    Route::get('', 'KabkotaController@index');
    Route::get('tambah','KabkotaController@create');
    Route::post('tambah/save', 'KabkotaController@store');
    Route::get('edit/{id_kabkota}','KabkotaController@edit');
    Route::patch('edit/{id_kabkota}/save', 'KabkotaController@update');
    Route::delete('delete/{id_kabkota}', 'KabkotaController@destroy');
});

Route::prefix('kecamatan')->group(function () {
    Route::get('', 'KecamatanController@index');
    Route::get('tambah','KecamatanController@create');
    Route::post('tambah/save', 'KecamatanController@store');
    Route::get('edit/{id_kecamatan}','KecamatanController@edit');
    Route::patch('edit/{id_kecamatan}/save', 'KecamatanController@update');
    Route::delete('delete/{id_kecamatan}', 'KecamatanController@destroy');
});

Route::prefix('keldes')->group(function(){
    Route::get('', 'KeldesController@index');
    Route::get('cari', 'KeldesController@cari');
    Route::get('tambah','KeldesController@create');
    Route::post('tambah/save', 'KeldesController@store');
    Route::get('edit/{id_keldes}','KeldesController@edit');
    Route::patch('edit/{id_keldes}/save', 'KeldesController@update');
    Route::delete('delete/{id_keldes}', 'KeldesController@destroy');
});

Route::prefix('pengguna')->group(function(){
    Route::get('', 'UserController@index');
    Route::get('tambah','UserController@create');
    Route::post('tambah/save', 'UserController@store');
    Route::get('edit/{id_provinsi}','UserController@edit');
    Route::patch('edit/{id_provinsi}/save', 'UserController@update');
    Route::delete('delete/{id_provinsi}', 'UserController@destroy');
});

Route::prefix('rekap-tanah')->group(function(){
    Route::get('', 'RekapTanahController@index');
    Route::post('laporan','RekapTanahController@filterlaporan');
    Route::get('cetak-pdf/{tgl}/{tgl1}', 'RekapTanahController@cetak_pdf');
});
