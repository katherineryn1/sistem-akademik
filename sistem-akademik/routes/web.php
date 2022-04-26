<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaakController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\RosterController;
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
Route::get('/daak/jadwal-kuliah/{id}',[DaakController::class, 'jadwalKuliah']);
Route::get('/daak/matakuliah-kurikulum',[DaakController::class, 'matakuliahKurikulum']);
Route::get('/daak/matakuliah/{kode}',[DaakController::class, 'matakuliahKurikulum']);
Route::get('/daak/kurikulum/{kurikulum}',[DaakController::class, 'matakuliahKurikulum']);
Route::get('/daak/jadwal-ujian',[DaakController::class, 'jadwalKuliah']);
Route::get('/daak/pengumuman',[DaakController::class, 'pengumuman']);
Route::get('/daak/pengumuman/{id}',[DaakController::class, 'pengumuman']);
Route::get('/daak/mahasiswa',[DaakController::class, 'akunMahasiswa']);
Route::get('/daak/mahasiswa/{nomorInduk}',[DaakController::class, 'akunMahasiswa']);
Route::get('/daak/dosen',[DaakController::class, 'akunDosen']);
Route::get('/daak/dosen/{nomorInduk}',[DaakController::class, 'akunDosen']);
Route::get('/daak/pengguna',[DaakController::class, 'akunPengguna']);
Route::get('/daak/pengguna/{nomorInduk}',[DaakController::class, 'akunPengguna']);

// Global
Route::put('v1/reset-password', [PenggunaController::class, 'resetPassword'])->name("resetpassword_form");
Route::put('v1/update-password', [PenggunaController::class, 'gantiPassword'])->name("updatepassword_form");

Route::get('v1/pengguna/{nomorInduk}', [PenggunaController::class, 'userInfo']);
Route::get('v1/pengguna', [PenggunaController::class, 'getAll']);
Route::post('v1/pengguna', [PenggunaController::class, 'insert']);
Route::put('v1/pengguna/{nomorInduk}', [PenggunaController::class, 'update']);
Route::delete('v1/pengguna', [PenggunaController::class, 'delete']);

Route::get('v1/dosen/{nomorInduk}',  [DosenController::class, 'userInfo']);
Route::get('v1/dosen',  [DosenController::class, 'getAll']);
Route::post('v1/dosen', [DosenController::class, 'insert']);
Route::put('v1/dosen/{nomorInduk}', [DosenController::class, 'update']);
Route::delete('v1/dosen', [DosenController::class, 'delete']);

Route::get('v1/mahasiswa/{nomorInduk}', [MahasiswaController::class, 'penggunaInfo']);
Route::get('v1/mahasiswa',[MahasiswaController::class, 'getAll'] );
Route::post('v1/mahasiswa', [MahasiswaController::class, 'insert']);
Route::put('v1/mahasiswa/{nomorInduk}', [MahasiswaController::class, 'update']);
Route::delete('v1/mahasiswa', [MahasiswaController::class, 'delete']);

Route::get('v1/pengumuman', [PengumumanController::class, 'getAll']);
Route::post('v1/pengumuman', [PengumumanController::class, 'insert']);
Route::put('v1/pengumuman/{id}', [PengumumanController::class, 'update']);
Route::delete('v1/pengumuman', [PengumumanController::class, 'delete']);

Route::get('v1/matakuliah/{kode}', [MatakuliahController::class, 'getAll']);
Route::get('v1/matakuliah', [MatakuliahController::class, 'matakuliahInfo']);
Route::post('v1/matakuliah', [MatakuliahController::class, 'insert']);
Route::put('v1/matakuliah/{kode}', [MatakuliahController::class, 'update']);
Route::delete('v1/matakuliah', [MatakuliahController::class, 'delete']);

Route::get('v1/kurikulum/{id}', [KurikulumController::class, 'getAll']);
Route::get('v1/kurikulum',  [KurikulumController::class, 'kurikulumInfo']);
Route::post('v1/kurikulum',  [KurikulumController::class, 'insert']);
Route::put('v1/kurikulum/{id}',  [KurikulumController::class, 'update']);
Route::delete('v1/kurikulum',  [KurikulumController::class, 'delete']);

Route::get('v1/jadwal/{id}', [RosterController::class, 'getAll']);
Route::get('v1/jadwal', [RosterController::class, 'jadwalInfo']);
Route::post('v1/jadwal', [RosterController::class, 'insert']);
Route::put('v1/jadwal/{id}', [RosterController::class, 'update']);
Route::delete('v1/jadwal', [RosterController::class, 'delete']);

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


