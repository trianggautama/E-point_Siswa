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

// });
