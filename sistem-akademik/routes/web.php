<?php

use App\Http\Controllers\DaakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DosenController;
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

// Landing Page
Route::get('/', function () {
    return view('index');
});

// Coba Router dan controller + View
Route::get('/coba', [PenggunaController::class, 'show']);

// Login
Route::get('/login', function () {
    return view('pages-login');
})->name("login");
Route::post('/login', [PenggunaController::class, 'login'])->name("login_form");
Route::get('/logout', [PenggunaController::class, 'logout'])->name("logout_form");


// Mahasiswa
Route::get('/mahasiswa', function () {
    return view('mahasiswa.dashboard');
})->middleware();
Route::get('/mahasiswa/jadwal-kuliah',[]);
Route::get('/mahasiswa/transkrip-nilai',[]);
Route::get('/mahasiswa/tracking-skripsi',[]);
Route::get('/mahasiswa/transaksi-keuangan',[]);
Route::get('/mahasiswa/profile',[]);


// DAAK
Route::get('/daak',  [DaakController::class, 'dashboard']);
Route::get('/daak/jadwal-kuliah',[DaakController::class, 'jadwalKuliah']);
Route::get('/daak/matakuliah-kurikulum',[DaakController::class, 'matakuliahKurikulum']);
Route::get('/daak/jadwal-ujian',[DaakController::class, 'jadwalKuliah']);
Route::get('/daak/pengumuman',[DaakController::class, 'pengumuman']);
Route::get('/daak/mahasiswa',[DaakController::class, 'akunMahasiswa']);
Route::get('/daak/dosen',[DaakController::class, 'akunDosen']);
Route::get('/daak/pengguna',[DaakController::class, 'akunPengguna']);

// Global
Route::put('v1/reset-password', [PenggunaController::class, 'resetPassword'])->name("resetpassword_form");
Route::put('v1/update-password', [PenggunaController::class, 'gantiPassword'])->name("updatepassword_form");

Route::get('v1/pengguna/{nomorInduk}', [PenggunaController::class, 'userInfo']);
Route::get('v1/pengguna', [PenggunaController::class, 'getAll']);
Route::post('v1/pengguna', [PenggunaController::class, 'insert']);
Route::put('v1/pengguna/{nomorInduk}', [PenggunaController::class, 'update']);
Route::delete('v1/pengguna', [PenggunaController::class, 'delete']);

Route::get('v1/dosen/{nomorInduk}', []);
Route::get('v1/dosen', []);
Route::post('v1/dosen', []);
Route::put('v1/dosen/{nomorInduk}', []);
Route::delete('v1/dosen/{nomorInduk}', []);

Route::get('v1/mahasiswa/{nomorInduk}', []);
Route::get('v1/mahasiswa', []);
Route::post('v1/mahasiswa', []);
Route::put('v1/mahasiswa/{nomorInduk}', []);
Route::delete('v1/mahasiswa/{nomorInduk}', []);

Route::get('v1/pengumuman', [PengumumanController::class, 'testGetAll']);
Route::post('v1/pengumuman', [PengumumanController::class, 'insert']);
Route::put('v1/pengumuman/{id}', [PengumumanController::class, 'update']);
Route::delete('v1/pengumuman/{id}', [PengumumanController::class, 'delete']);

Route::get('v1/matakuliah/{kode}', []);
Route::get('v1/matakuliah', []);
Route::post('v1/matakuliah', []);
Route::put('v1/matakuliah/{kode}', []);
Route::delete('v1/matakuliah/{kode}', []);

Route::get('v1/kurikulum/{id}', []);
Route::get('v1/kurikulum', []);
Route::post('v1/kurikulum', []);
Route::put('v1/kurikulum/{id}', []);
Route::delete('v1/kurikulum/{id}', []);

Route::get('v1/jadwal/{id}', []);
Route::get('v1/jadwal', []);
Route::post('v1/jadwal', []);
Route::put('v1/jadwal/{id}', []);
Route::delete('v1/jadwal/{id}', []);

// Dosen
Route::get('/dosen', function () {
    return view('dosen.dashboard');
});

Route::get('/dosen/jadwal-mengajar', [DosenController::class, 'getJadwalMengajar']);
Route::get('/dosen/jadwal-mengajar/{week}', [DosenController::class, 'getDataJadwalMengajar']);

Route::get('/dosen/absensi', [DosenController::class, 'getKehadiranMengajar']);
Route::get('/dosen/absensi/kelas/{id}', [DosenController::class, 'getKelasMatakuliah']);
Route::get('/dosen/absensi/tanggal/{id}', [DosenController::class, 'getTanggalKurikulum']);
Route::get('/dosen/absensi/roster/{id_roster}/{id_kurikulum}', [DosenController::class, 'getKehadiranMahasiswa']);
Route::get('/dosen/absensi/roster/{id_roster}/{id_kurikulum}/{status}', [DosenController::class, 'getKehadiranMahasiswaByStatus']);
Route::post('/dosen/absensi/update', [DosenController::class, 'updateKehadiranMahasiswa']);

Route::get('/dosen/nilai-mahasiswa', [DosenController::class, 'getNilaiMahasiswa']);
Route::get('/dosen/nilai-mahasiswa/kelas/{id}', [DosenController::class, 'getKelasMatakuliah']);
Route::get('/dosen/nilai-mahasiswa/{id_kurikulum}', [DosenController::class, 'getListNilaiMahasiswa']);
Route::get('/dosen/nilai-mahasiswa/mahasiswa/{id_nilai}', [DosenController::class, 'getNilaiMahasiswaByIdNilai']);
Route::post('/dosen/nilai-mahasiswa/update/{id_nilai}', [DosenController::class, 'updateNilaiMahasiswa']);

Route::get('/dosen/profil', function () {
    return view('dosen.profil');
});

Route::get('/dosen/edit-profil', array('as' => 'edit-profil', function () {
    return view('dosen.edit_profil');
}));

Route::get('/dosen/tracking-skripsi', function () {
    return view('dosen.tracking_skripsi_home');
});

Route::get('/dosen/tracking-skripsi-add-mhs-bimbingan', function () {
    return view('dosen.tracking_skripsi_add_mhs');
});

Route::get('/dosen/tracking-skripsi-id', function () { #nanti dikasih id mhs di route nya
    return view('dosen.tracking_skripsi_mhs');
});

Route::get('/dosen/tracking-skripsi-edit-id', function () { #nanti dikasih id mhs di route nya
    return view('dosen.tracking_skripsi_edit_komentar');
});

// Mahasiswa
Route::get('/mahasiswa', function () {
    return view('mahasiswa.dashboard');
});


