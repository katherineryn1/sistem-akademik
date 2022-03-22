<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
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
    return view('index');
});

Route::get('/coba', [PenggunaController::class, 'show']);

// Pengguna
Route::get('/pengguna/{nomorInduk}', [PenggunaController::class, 'userInfo']);
Route::get('/pengguna/', [PenggunaController::class, 'testGetAll']);
Route::post('/pengguna/', [PenggunaController::class, 'insert']);
Route::put('/pengguna/', [PenggunaController::class, 'update']);
Route::delete('/pengguna/{nomorInduk}', [PenggunaController::class, 'deleteInfo'])->name("delete_pengguna");
Route::post('/login', [PenggunaController::class, 'login'])->name("login");
Route::get('/logout', [PenggunaController::class, 'logout'])->name("logout");
Route::put('/resetpassword', [PenggunaController::class, 'resetPassword'])->name("resetpassword");
Route::put('/updatepassword', [PenggunaController::class, 'gantiPassword'])->name("updatepassword");

// Pengumuman


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
