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
Route::get('/', 'adminController@depan')->name('depan');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/index', 'adminController@index')->name('index');
    Route::get('/pejabat', 'adminController@pejabatIndex')->name('pejabatIndex');

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
    Route::get('/kelas/detail/{uuid}', 'KelasController@show')->name('kelasShow');
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
    Route::get('/konsultasi/detail/{uuid}', 'konsultasiController@show')->name('konsultasiShow');
    Route::get('/konsultasi/edit/{uuid}', 'konsultasiController@edit')->name('konsultasiEdit');
    Route::put('/konsultasi/edit/{uuid}', 'konsultasiController@update')->name('konsultasiUpdate');
    Route::get('/konsultasi/delete/{uuid}', 'konsultasiController@destroy')->name('konsultasiDestroy');
    Route::get('/konsultasi/filterWaktu', 'konsultasiController@filterWaktu')->name('konsultasiFilterWaktu');

// point route
    Route::get('/point', 'pointController@index')->name('pointIndex');
    Route::get('/point/filter/kelas', 'pointController@filterKelas')->name('poinFilterKelas');
    Route::get('/point/{uuid}', 'pointController@show')->name('pointShow');

// pelanggaran route
    Route::get('/pelanggaran', 'pelanggaranController@index')->name('pelanggaranIndex');
    Route::post('/pelanggaran', 'pelanggaranController@store')->name('pelanggaranStore');
    Route::get('/pelanggaran/detail/{uuid}', 'pelanggaranController@show')->name('pelanggaranShow');
    Route::get('/pelanggaran/edit/{uuid}', 'pelanggaranController@edit')->name('pelanggaranEdit');
    Route::put('/pelanggaran/edit/{uuid}', 'pelanggaranController@update')->name('pelanggaranUpdate');
    Route::get('/pelanggaran/delete/{uuid}', 'pelanggaranController@destroy')->name('pelanggaranDestroy');
    Route::get('/pelanggaran/filter', 'pelanggaranController@filter')->name('pelanggaranFilter');
    Route::get('/pelanggaran/filterWaktu', 'pelanggaranController@filterWaktu')->name('pelanggaranFilterWaktu');


// prestasi route
    Route::get('/prestasi', 'prestasiController@index')->name('prestasiIndex');
    Route::post('/prestasi', 'prestasiController@store')->name('prestasiStore');
    Route::get('/prestasi/detail/{uuid}', 'prestasiController@show')->name('prestasiShow');
    Route::post('/prestasi/detail/create', 'prestasiController@detailStore')->name('detailStore');
    Route::get('/prestasi/edit/{uuid}', 'prestasiController@edit')->name('prestasiEdit');
    Route::put('/prestasi/edit/{uuid}', 'prestasiController@update')->name('prestasiUpdate');
    Route::get('/prestasi/delete/{uuid}', 'prestasiController@destroy')->name('prestasiDestroy');
    Route::get('/prestasi/filter', 'prestasiController@filter')->name('prestasiFilter');
    Route::get('/prestasi/filterWaktu', 'prestasiController@filterWaktu')->name('prestasiFilterWaktu'); 


//Cetak Route
    Route::get('/pegawai/cetak', 'reportController@pegawaiAll')->name('pegawaiCetak');
    Route::get('/siswa/cetak', 'reportController@siswaAll')->name('siswaCetak');
    Route::post('/siswa/filter', 'reportController@siswaFilter')->name('siswaFilterCetak');
    Route::get('/wali/cetak', 'reportController@wali')->name('waliCetak');
    Route::get('/pedoman/cetak', 'reportController@pedomanAll')->name('pedomanCetak');
    Route::post('/pedoman/filter', 'reportController@pedomanFilter')->name('pedomanFilterCetak');
    Route::get('/konsultasi/cetak', 'reportController@konsultasiAll')->name('konsultasiCetak');
    Route::get('/poin/cetak', 'reportController@poinAll')->name('poinCetak');
    Route::post('/point/filter/kelas', 'reportController@poinFilterKelas')->name('poinFilterKelasCetak');
    Route::get('/pelanggaran/cetak', 'reportController@pelanggaranAll')->name('pelanggaranCetak');
    Route::post('/pelanggaran/filter', 'reportController@pelanggaranFilter')->name('pelanggaranFilterCetak');
    Route::get('/prestasi/cetak', 'reportController@prestasiAll')->name('prestasiCetak');
    Route::post('/prestasi/filter', 'reportController@prestasifilter')->name('prestasiFilterCetak');
    Route::get('/prestasi/siswa/cetak/{uuid}', 'reportController@prestasiSiswa')->name('prestasiSiswaCetak');
    Route::post('/pelanggaran/filterWaktu', 'reportController@pelanggaranFilterWaktu')->name('pelanggaranFilterWaktuCetak'); 
    Route::post('/prestasi/filterWaktu', 'reportController@prestasiFilterWaktu')->name('prestasiFilterWaktuCetak'); 
    Route::post('/konsultasi/filterWaktu', 'reportController@konsultasiFilterWaktu')->name('konsultasiFilterWaktuCetak');

});
