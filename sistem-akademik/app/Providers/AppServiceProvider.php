<?php

namespace App\Providers;

use App\Modules\Dosen\Model\DosenData;
use App\Modules\Perkuliahan\Model\KehadiranData;
use App\Modules\Perkuliahan\Model\KurikulumData;
use App\Modules\Mahasiswa\Model\MahasiswaData;
use App\Modules\Perkuliahan\Model\MatakuliahData;
use App\Modules\Perkuliahan\Model\NilaiData;
use App\Modules\Perkuliahan\Model\PengambilanMatakuliahData;
use App\Modules\Pengumuman\Model\PengumumanData;
use App\Modules\Perkuliahan\Model\RosterData;
use App\Modules\Pengguna\Model\User;

use App\Modules\Dosen\Service\DosenService;
use App\Modules\Mahasiswa\Service\MahasiswaService;
use App\Modules\Pengguna\Service\PenggunaService;
use App\Modules\Pengumuman\Service\PengumumanService;
use App\Modules\Perkuliahan\Service\KehadiranService;
use App\Modules\Perkuliahan\Service\KurikulumService;
use App\Modules\Perkuliahan\Service\MatakuliahService;
use App\Modules\Perkuliahan\Service\NilaiService;
use App\Modules\Perkuliahan\Service\PengambilanMatakuliahService;
use App\Modules\Perkuliahan\Service\RosterService;

use App\Modules\Skripsi\Model\SkripsiData;
use App\Modules\Skripsi\Service\SkripsiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Register Service with Persistence Manager
        new PenggunaService(new User());
        new PengumumanService(new PengumumanData());
        new DosenService(new DosenData());
        new MahasiswaService(new MahasiswaData());
        new MatakuliahService(new MatakuliahData());
        new KurikulumService(new KurikulumData());
        new NilaiService(new NilaiData());
        new KehadiranService(new KehadiranData());
        new RosterService(new RosterData());
        new PengambilanMatakuliahService(new PengambilanMatakuliahData());
        new SkripsiService(new SkripsiData());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
