<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengumumanController;
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
    return view('dosen.dashboard');
});

Route::get('/coba', [PenggunaController::class, 'show']);

// Pengguna
Route::get('/pengguna/{nomorInduk}', [PenggunaController::class, 'userInfo']);
Route::get('/pengguna/', [PenggunaController::class, 'testGetAll']);
Route::post('/pengguna/', [PenggunaController::class, 'insert_form']);
Route::put('/pengguna/', [PenggunaController::class, 'update_form']);
Route::delete('/pengguna/{nomorInduk}', [PenggunaController::class, 'deleteInfo'])->name("delete_pengguna_form");

Route::get('/login', function () {
    return view('pages-login');
})->name("login");
Route::post('/login', [PenggunaController::class, 'login'])->name("login_form");

Route::get('/logout', [PenggunaController::class, 'logout'])->name("logout_form");
Route::put('/resetpassword', [PenggunaController::class, 'resetPassword'])->name("resetpassword_form");
Route::put('/updatepassword', [PenggunaController::class, 'gantiPassword'])->name("updatepassword_form");

// Pengumuman
Route::get('/pengumuman/', [PengumumanController::class, 'testGetAll']);
Route::get('/pengumuman/insert', [PengumumanController::class, 'insert']);
Route::get('/pengumuman/update', [PengumumanController::class, 'update']);
Route::get('/pengumuman/delete/{id}', [PengumumanController::class, 'delete']);


// Dosen
Route::get('/dosen/absensi', function () {
    return view('dosen.absensi');
});

Route::get('/dosen/nilai-mahasiswa', function () {
    return view('dosen.nilai_mahasiswa');
});

Route::get('/dosen/profil', function () {
    return view('dosen.profil');
});

Route::get('/dosen/edit-profil', array('as' => 'edit-profil', function () {
    return view('dosen.edit_profil');
}));

Route::get('/dosen/tracking-skripsi', function () {
    return view('dosen.tracking_skripsi');
});

Route::get('/dosen/tracking-skripsi-id', function () { #nanti dikasih id mhs di route nya
    return view('dosen.tracking_skripsi_view');
});

Route::get('/dosen/tracking-skripsi-edit-id', function () { #nanti dikasih id mhs di route nya
    return view('dosen.tracking_skripsi_edit_komen');
});
