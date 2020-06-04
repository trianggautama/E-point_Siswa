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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'adminController@index')->name('index');
Route::get('/pejabat', 'adminController@pejabatIndex')->name('pejabatIndex');

// Route::group(['middleware' => ['auth']], function () {
// user route
Route::get('/user', 'UserController@index')->name('userIndex');
Route::post('/user', 'UserController@store')->name('userStore');
Route::get('/user/profil', 'UserController@profil')->name('userProfil');
Route::get('/user/edit/{uuid}', 'UserController@edit')->name('userEdit');
Route::put('/user/edit/{uuid}', 'UserController@update')->name('userUpdate');
Route::get('/user/delete/{uuid}', 'UserController@destroy')->name('userDestroy');

// pejabat route
Route::get('/pejabat', 'PejabatController@index')->name('pejabatIndex');
Route::post('/pejabat', 'PejabatController@store')->name('pejabatStore');
Route::get('/pejabat/edit/{uuid}', 'PejabatController@edit')->name('pejabatEdit');
Route::put('/pejabat/edit/{uuid}', 'PejabatController@update')->name('pejabatUpdate');
Route::get('/pejabat/delete/{uuid}', 'PejabatController@destroy')->name('pejabatDestroy');

// kelas route
Route::get('/kelas', 'KelasController@index')->name('kelasIndex');
Route::post('/kelas', 'KelasController@store')->name('kelasStore');
Route::get('/kelas/edit/{uuid}', 'KelasController@edit')->name('kelasEdit');
Route::put('/kelas/edit/{uuid}', 'KelasController@update')->name('kelasUpdate');
Route::get('/kelas/delete/{uuid}', 'KelasController@destroy')->name('kelasDestroy');

// siswa route
Route::get('/siswa', 'SiswaController@index')->name('siswaIndex');
Route::post('/siswa', 'SiswaController@store')->name('siswaStore');
Route::get('/siswa/detail/{uuid}', 'SiswaController@show')->name('siswaShow');
Route::get('/siswa/edit/{uuid}', 'SiswaController@edit')->name('siswaEdit');
Route::put('/siswa/edit/{uuid}', 'SiswaController@update')->name('siswaUpdate');
Route::get('/siswa/delete/{uuid}', 'SiswaController@destroy')->name('siswaDestroy');
Route::get('/siswa/filter', 'SiswaController@filter')->name('siswaFilter');

// wali route
Route::get('/wali', 'waliController@index')->name('waliIndex');
Route::get('/wali/edit/{uuid}', 'waliController@edit')->name('waliEdit');
Route::put('/wali/edit/{uuid}', 'waliController@update')->name('waliUpdate');
Route::get('/wali/filter', 'waliController@filter')->name('waliFilter');

// pedoman route
Route::get('/pedoman', 'PedomanController@index')->name('pedomanIndex');
Route::post('/pedoman', 'PedomanController@store')->name('pedomanStore');
Route::get('/pedoman/edit/{uuid}', 'PedomanController@edit')->name('pedomanEdit');
Route::put('/pedoman/edit/{uuid}', 'PedomanController@update')->name('pedomanUpdate');
Route::get('/pedoman/delete/{uuid}', 'PedomanController@destroy')->name('pedomanDestroy');
Route::get('/pedoman/filter', 'pedomanController@filter')->name('pedomanFilter');

// konsultasi route
Route::get('/konsultasi', 'konsultasiController@index')->name('konsultasiIndex');
Route::post('/konsultasi', 'konsultasiController@store')->name('konsultasiStore');
Route::get('/konsultasi/edit/{uuid}', 'konsultasiController@edit')->name('konsultasiEdit');
Route::put('/konsultasi/edit/{uuid}', 'konsultasiController@update')->name('konsultasiUpdate');
Route::get('/konsultasi/delete/{uuid}', 'konsultasiController@destroy')->name('konsultasiDestroy');

// point route
Route::get('/point', 'pointController@index')->name('pointIndex');

// pelanggaran route
Route::get('/pelanggaran', 'pelanggaranController@index')->name('pelanggaranIndex');
Route::post('/pelanggaran', 'pelanggaranController@store')->name('pelanggaranStore');
Route::get('/pelanggaran/edit/{uuid}', 'pelanggaranController@edit')->name('pelanggaranEdit');
Route::put('/pelanggaran/edit/{uuid}', 'pelanggaranController@update')->name('pelanggaranUpdate');
Route::get('/pelanggaran/delete/{uuid}', 'pelanggaranController@destroy')->name('pelanggaranDestroy');

// prestasi route
Route::get('/poiprestasi', 'prestasiController@index')->name('prestasiIndex');
Route::get('/prestasi/edit', 'prestasiController@edit')->name('prestasiEdit');

//Cetak Route
Route::get('/siswa/cetak', 'reportController@siswaAll')->name('siswaCetak');
Route::post('/siswa/filter', 'reportController@siswaFilter')->name('siswaFilterCetak');
Route::get('/wali/cetak', 'reportController@wali')->name('waliCetak');
Route::get('/pedoman/cetak', 'reportController@pedomanAll')->name('pedomanCetak');
Route::post('/pedoman/filter', 'reportController@pedomanFilter')->name('pedomanFilterCetak');

// });
