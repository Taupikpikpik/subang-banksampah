<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PenarikanSaldoController;

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

Route::get('/', 'Home\HomeController@index');
Route::get('/profile', 'Home\HomeController@profile');
Route::post('/profile/update/{id}', 'Home\HomeController@profileUpdate');
Route::get('/get-harga-beli/{id}', 'Home\HomeController@getSampahDetail');
Route::get('/get-data-sampah/{id}', 'Home\HomeController@getDataSampah');
// Route::get('/panggilchart', function(){
//     return view('admin.chart1');
// });

Route::get('/nasabah/jadwal', 'Home\HomeController@jadwalNasabah');
Route::get('/withdraw', 'Home\HomeController@withdraw');
Route::get('/withdraw/create', 'Home\HomeController@createWithdraw');
Route::post('/withdraw/store', 'Home\HomeController@storeWithdraw');
Route::get('/sell', 'Home\HomeController@sell');
Route::get('/sell/create', 'Home\HomeController@createSell');
Route::get('/get-detail-penjualan/{id}', 'Home\HomeController@detailPenjualan');
Route::post('/sell/store', 'Home\HomeController@storeSell');

Route::get('/petugas', 'Home\HomeController@indexPetugas');
Route::get('/petugas/jadwal', 'Home\HomeController@jadwalPetugas');
Route::post('/petugas/jadwal/{id}', 'Home\HomeController@petugasApprove');

Route::get('/pengepul', 'Home\HomeController@indexPengepul');
Route::get('/pengepul/pembelian', 'Home\HomeController@purchase');
Route::post('/pengepul/beli', 'Home\HomeController@storePurchase');
Route::get('/get-detail-pembelian/{id}', 'Home\HomeController@detailpembelian');
Route::get('/lupa-password', 'Home\HomeController@lupaPassword');
Route::post('/lupa-password', 'Home\HomeController@prosesLupaPassword');
Route::get('/reset_password/{id}', 'Home\HomeController@resetPassword');
Route::post('/reset_password/{id}', 'Home\HomeController@prosesResetPassword');



Route::get('/user-login', 'Home\HomeController@loginPage')->name('login.page');
Route::get('/user-register', 'Home\HomeController@registerPage')->name('register.page');
Route::post('/user-register', 'Home\HomeController@userRegisterSubmit')->name('register.user');;
Route::post('/user-login', 'Home\HomeController@userLogin')->name('login.user');
Route::get('/user-logout', 'Home\HomeController@userLogout')->name('logout.user');

Auth::routes();
Route::get('logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

// Admin
Route::get('chart', 'Admin\AdminController@chart');
Route::get('admin', 'Admin\AdminController@index');
Route::get('admin/laporan-penjualan', 'Admin\AdminController@reportPenjualan');
Route::get('admin/export-laporan-penjualan', 'Admin\AdminController@exportPenjualan')->name('export.penjualan');
Route::get('admin/export-laporan-pembelian', 'Admin\AdminController@exportPembelian')->name('export.pembelian');
Route::get('admin/laporan-pembelian', 'Admin\AdminController@reportPembelian');
Route::resource('admin/user', 'Admin\\UserController');
Route::resource('admin/kategori-sampah', 'Admin\\KategoriSampahController');
Route::resource('admin/bank-sampah', 'Admin\\BankSampahController');
Route::resource('admin/penjualan-sampah', 'Admin\\PenjualanSampahController');
Route::resource('admin/pembelian-sampah', 'Admin\\PembelianSampahController');
Route::get('admin/pembelian-sampah/approve/{id}', 'Admin\PembelianSampahController@approve');
Route::post('admin/pembelian-sampah/reject/{id}', 'Admin\PembelianSampahController@reject');

Route::resource('admin/transaksi-sampah', 'Admin\\TransaksiSampahController');
Route::resource('admin/saldo', 'Admin\\SaldoController');
Route::resource('admin/jadwal-pengambilan', 'Admin\\JadwalPengambilanController');
Route::resource('admin/penarikan-saldo', 'Admin\\PenarikanSaldoController');
Route::post('admin/penarikan-saldo/reject/{id}', [PenarikanSaldoController::class, 'reject'])->name('reject-saldo');
Route::get('admin/penarikan-saldo/approve/{id}', 'Admin\PenarikanSaldoController@approve');
// Route::get('admin/penarikan-saldo/reject/{id}', 'Admin\PenarikanSaldoController@reject');
Route::post('admin/penarikan-saldo/izinkan/{id}', [PenarikanSaldoController::class, 'izinkan'])->name('izinkan');

// Reviewer
Route::get('reviewer', 'Reviewer\ReviewerController@index');
Route::get('reviewer/laporan-penjualan', 'Reviewer\ReviewerController@reportPenjualan');
Route::get('reviewer/laporan-pembelian', 'Reviewer\ReviewerController@reportPembelian');
