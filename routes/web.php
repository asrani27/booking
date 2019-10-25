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

Route::get('mail', 'MailController@index');
Route::post('sendEmail', 'MailController@kirim');

// Registration Routes...
$this->get('register', function () {
    return redirect('/login');
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/agenda/komunitas', 'FrontController@komunitas');
Route::get('/agenda/validasi/{id}', 'FrontController@validasi');
Route::get('/agenda/pemko', 'FrontController@pemko');
Route::get('/booking', 'FrontController@booking');
Route::get('/daftar', 'FrontController@daftaranggota');
Route::get('/agenda/pemko/daftar/{id}', 'FrontController@daftar');
Route::get('/undangan', 'FrontController@undangan');
Route::post('/peserta/daftar/store', 'FrontController@simpanPeserta')->name('storePeserta');
Route::post('/anggota/daftar/store', 'FrontController@simpanAnggota')->name('storeAnggota');
Route::post('/booking/store', 'FrontController@store')->name('storeBooking');

Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::post('/anggotaplaza/mail', 'AnggotaController@cekmail')->name('cek.mail');
    Route::post('/anggotaplaza/user', 'AnggotaController@cekuser')->name('cek.user');
    Route::get('/anggotaplaza/delete/{id}', 'AnggotaController@delete');
    Route::get('/anggotaplaza/edit/{id}', 'AnggotaController@edit');
    Route::post('/anggotaplaza/update/{id}', 'AnggotaController@update')->name('updateAnggota');
    Route::get('/anggotaplaza', 'AnggotaController@index');
    Route::get('/anggotaplaza/add', 'AnggotaController@add')->name('addAnggota');
    Route::get('/anggotaplaza/pdf', 'LaporanController@anggota')->name('pdfAnggota');
    Route::post('/anggotaplaza/store', 'AnggotaController@store')->name('saveAnggota');

    Route::get('/komunitas', 'MasterkomunitasController@index');
    Route::get('/komunitas/daftaranggota/{id}', 'MasterkomunitasController@daftaranggota');
    Route::get('/komunitas/add', 'MasterkomunitasController@add')->name('addKomunitas');
    Route::post('/komunitas/store', 'MasterkomunitasController@store')->name('saveKomunitas');
    Route::post('/komunitas/update/{id}', 'MasterkomunitasController@update')->name('updateMasterKomunitas');
    Route::get('/komunitas/edit/{id}', 'MasterkomunitasController@edit');
    Route::get('/komunitas/delete/{id}', 'MasterkomunitasController@delete');
    Route::get('/komunitas/delete/anggota/{id_anggota}/{id_komunitas}', 'MasterkomunitasController@deleteanggota');
    Route::post('/komunitas/saveanggota', 'MasterkomunitasController@simpananggota')->name('saveAnggotaKomunitas');

    Route::get('/agendakomunitas', 'KomunitasController@index');
    Route::get('/agendakomunitas/delete/{id}', 'KomunitasController@delete');
    Route::post('/agendakomunitas/update/{id}', 'KomunitasController@update')->name('updateKomunitas');
    Route::get('/agendakomunitas/edit/{id}', 'KomunitasController@edit');

    Route::get('/setting/waktu', 'WaktuController@index');
    Route::post('/setting/waktu', 'WaktuController@store')->name('saveTime');
    Route::post('/setting/waktu/update', 'WaktuController@update')->name('updateTime');
    Route::get('/setting/waktu/edit', 'WaktuController@edit');
    Route::get('/setting/waktu/delete/{id}', 'WaktuController@delete');
    
    Route::get('/agendapemko/absensi/{id}', 'LaporanController@peserta');
    Route::get('/nomorrandom', 'LaporanController@nomorrandom');

});

Route::group(['middleware' => ['auth', 'role:anggota']], function () {
    Route::get('/pesan/tempat', 'BookingController@pesan')->name('pesan');
    Route::post('/pesan/tempat/store', 'BookingController@pesanTempat')->name('pesanTempat');
    Route::post('/pesan/waktu', 'BookingController@waktu');
    Route::get('/komunitasku', 'MyKomunitasController@index');
    Route::get('/komunitasku/{id}/addanggota', 'MyKomunitasController@add');
    Route::get('/komunitasku/daftaranggota/{id}', 'MyKomunitasController@daftaranggota');
    Route::post('/komunitasku/store', 'MyKomunitasController@store')->name('saveAnggotaKomunitasku');
    Route::get('/komunitasku/delete/anggota/{id_anggota}/{id_komunitas}', 'MyKomunitasController@deleteanggota');
    Route::post('/anggotaplaza/mailkom', 'AnggotaController@cekmail')->name('cek.mailkom');
    Route::post('/anggotaplaza/userkom', 'AnggotaController@cekuser')->name('cek.userkom');
});


Route::group(['middleware' => ['auth', 'role:admin|pengelola']], function () {
    Route::get('/agendapemko', 'PemkoController@index');
    Route::get('/agendapemko/daftarpeserta/{id}', 'PemkoController@peserta');
    Route::get('/agendapemko/edit/{id}', 'PemkoController@edit');
    Route::get('/agendapemko/delete/{id}', 'PemkoController@delete');
    Route::get('/agendapemko/add', 'PemkoController@add')->name('addPemko');
    Route::post('/agendapemko/store', 'PemkoController@store')->name('saveAgendaPemko');
    Route::post('/agendapemko/update/{id}', 'PemkoController@update')->name('updateAgendaPemko');
    Route::get('/agendapemko/peserta/batal/{id}', 'PemkoController@batalpeserta');

    Route::get('/pesertakegiatan', 'PesertaController@index');
    Route::get('/peserta/setujui/{id}', 'PesertaController@setujui');
    Route::get('/peserta/tidaksetujui/{id}', 'PesertaController@tidaksetujui');
});

Route::group(['middleware' => ['auth', 'role:anggota|pengelola']], function () {
    Route::get('/profil', 'ProfilController@index')->name('profil');
    Route::post('/profil/update/{id}', 'ProfilController@update')->name('updateAnggota2');
    Route::post('/profil/updatepass/{id}', 'ProfilController@updatePass')->name('updatePass');
});