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
    if(Auth::check()) {
        return redirect()->route('home');
    } 
    return view('welcome');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', function () {
    return redirect('/login');
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/booking', 'FrontController@booking');
Route::get('/booking/store', 'FrontController@store')->name('storeBooking');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/agendakomunitas', 'KomunitasController@index');
    Route::get('/agendakomunitas/delete/{id}', 'KomunitasController@delete');
    Route::post('/agendakomunitas/update/{id}', 'KomunitasController@update')->name('updateKomunitas');
    Route::get('/agendakomunitas/edit/{id}', 'KomunitasController@edit');
    Route::get('/agendapemko', 'PemkoController@index');
    Route::get('/pesertakegiatan', 'PesertaController@index');
    Route::get('/setting/waktu', 'WaktuController@index');
    Route::post('/setting/waktu', 'WaktuController@store')->name('saveTime');
    Route::post('/setting/waktu/update', 'WaktuController@update')->name('updateTime');
    Route::get('/setting/waktu/edit', 'WaktuController@edit');
    Route::get('/setting/waktu/delete/{id}', 'WaktuController@delete');
});
