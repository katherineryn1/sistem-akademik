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
use App\Http\Controllers\PengambilanMatakuliahController;
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
    return view('pages-login');
})->name("login");

// Coba Router dan controller + View
Route::get('/coba', [PenggunaController::class, 'show']);

// Login
Route::get('/login', function () {
    return view('pages-login');
})->name("login");
Route::post('/login', [PenggunaController::class, 'login'])->name("login_form");
Route::get('/logout', [PenggunaController::class, 'logout'])->name("logout_form");


// Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'dashboard'])->middleware(['checklogin' , 'onlyMahasiswa']);
Route::get('/mahasiswa/jadwal-kuliah',[]);
Route::get('/mahasiswa/transkrip-nilai', [MahasiswaController::class, 'transkripNilai'])->middleware(['checklogin' , 'onlyMahasiswa']);
Route::get('/mahasiswa/rencana-studi', [MahasiswaController::class, 'rencanaStudi'])->middleware(['checklogin' , 'onlyMahasiswa']);
Route::get('/mahasiswa/tracking-skripsi',[]);
Route::get('/mahasiswa/transaksi-keuangan',[]);
Route::get('/mahasiswa/profile',[]);


// DAAK
Route::get('/daak',  [DaakController::class, 'dashboard'])->middleware(['checklogin' , 'onlyDaak']);;
Route::get('/daak/jadwal-kuliah',[DaakController::class, 'jadwalKuliah'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/jadwal-kuliah/{id}',[DaakController::class, 'jadwalKuliah'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/matakuliah-kurikulum',[DaakController::class, 'matakuliahKurikulum'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/pengambilan-matakuliah',[DaakController::class, 'pengambilanMatakuliah'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/matakuliah/{kode}',[DaakController::class, 'matakuliahKurikulum'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/kurikulum/{kurikulum}',[DaakController::class, 'matakuliahKurikulum'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/jadwal-ujian',[DaakController::class, 'jadwalKuliah'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/pengumuman',[DaakController::class, 'pengumuman'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/pengumuman/{id}',[DaakController::class, 'pengumuman'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/mahasiswa',[DaakController::class, 'akunMahasiswa'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/mahasiswa/{nomorInduk}',[DaakController::class, 'akunMahasiswa'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/dosen',[DaakController::class, 'akunDosen'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/dosen/{nomorInduk}',[DaakController::class, 'akunDosen'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/pengguna',[DaakController::class, 'akunPengguna'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/pengguna/{nomorInduk}',[DaakController::class, 'akunPengguna'])->middleware(['checklogin' , 'onlyDaak']);
Route::get('/daak/profil', function () {
    return view('daak.profil');
})->middleware(['checklogin' , 'onlyDaak']);

Route::get('/daak/edit-profil', array('as' => 'edit-profil', function () {
    return view('daak.edit_profil');
}))->middleware(['checklogin' , 'onlyDaak']);

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

Route::get('v1/kurikulum/pengambilan',  [PengambilanMatakuliahController::class, 'pengambilanInfo']);
Route::post('v1/kurikulum/pengambilan',  [PengambilanMatakuliahController::class, 'insert']);
Route::delete('v1/kurikulum/pengambilan',  [PengambilanMatakuliahController::class, 'delete']);

Route::get('v1/jadwal/{id}', [RosterController::class, 'getAll']);
Route::get('v1/jadwal', [RosterController::class, 'jadwalInfo']);
Route::post('v1/jadwal', [RosterController::class, 'insert']);
Route::put('v1/jadwal/{id}', [RosterController::class, 'update']);
Route::delete('v1/jadwal', [RosterController::class, 'delete']);

// Dosen
Route::get('/dosen', [DosenController::class, 'getJadwalMengajarDashboard'])->middleware(['checklogin' , 'onlyDosen']);

Route::get('/dosen/jadwal-mengajar', [DosenController::class, 'getJadwalMengajar'])->middleware(['checklogin' , 'onlyDosen']);
Route::get('/dosen/jadwal-mengajar/{week}', [DosenController::class, 'getDataJadwalMengajar']);

Route::get('/dosen/absensi', [DosenController::class, 'getKehadiranMengajar'])->middleware(['checklogin' , 'onlyDosen']);
Route::get('/dosen/absensi/kelas/{id}', [DosenController::class, 'getKelasMatakuliah']);
Route::get('/dosen/absensi/tanggal/{id}', [DosenController::class, 'getTanggalKurikulum']);
Route::get('/dosen/absensi/roster/{id_roster}/{id_kurikulum}', [DosenController::class, 'getKehadiranMahasiswa']);
Route::get('/dosen/absensi/roster/{id_roster}/{id_kurikulum}/{status}', [DosenController::class, 'getKehadiranMahasiswaByStatus']);
Route::post('/dosen/absensi/update', [DosenController::class, 'updateKehadiranMahasiswa']);

Route::get('/dosen/nilai-mahasiswa', [DosenController::class, 'getNilaiMahasiswa'])->middleware(['checklogin' , 'onlyDosen']);
Route::get('/dosen/nilai-mahasiswa/kelas/{id}', [DosenController::class, 'getKelasMatakuliah']);
Route::get('/dosen/nilai-mahasiswa/{id_kurikulum}', [DosenController::class, 'getListNilaiMahasiswa']);
Route::get('/dosen/nilai-mahasiswa/mahasiswa/{id_nilai}', [DosenController::class, 'getNilaiMahasiswaByIdNilai']);
Route::post('/dosen/nilai-mahasiswa/update/{id_nilai}', [DosenController::class, 'updateNilaiMahasiswa']);


Route::get('/dosen/profil', function () {
    return view('dosen.profil');
})->middleware(['checklogin' , 'onlyDosen']);

// Route::get('/dosen/profil', function () {
//     return view('dosen.profil');
// });
Route::get('/dosen/profil', [DosenController::class, 'showProfileDosen']);


Route::get('/dosen/edit-profil', array('as' => 'edit-profil', function () {
    return view('dosen.edit_profil');
}))->middleware(['checklogin' , 'onlyDosen']);

Route::get('/dosen/tracking-skripsi', [DosenController::class, 'bimbinganSkripsi']);
Route::get('/dosen/tracking-skripsi-add-mhs-bimbingan', [DosenController::class, 'addBimbinganSkripsi']);
Route::get('/dosen/tracking-skripsi/{id_skripsi}', [DosenController::class, 'detailBimbinganSkripsi']);
Route::get('/dosen/tracking-skripsi/{id_skripsi}/edit', [DosenController::class, 'editDetailBimbinganSkripsi']);

Route::delete('/tolakMhs/{id}', [DosenController::class, 'tolakMahasiswa']);
