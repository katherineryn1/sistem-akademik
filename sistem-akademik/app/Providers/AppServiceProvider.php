<?php

namespace App\Providers;

use App\Models\DosenData;
use App\Models\KehadiranData;
use App\Models\KurikulumData;
use App\Models\MahasiswaData;
use App\Models\MatakuliahData;
use App\Models\NilaiData;
use App\Models\PengambilanMatakuliahData;
use App\Models\PengumumanData;
use App\Models\PengumumanORM;
use App\Models\RosterData;
use App\Models\User;
use App\Modules\Dosen\Service\DosenService;
use App\Modules\Mahasiswa\Service\MahasiswaService;
use App\Modules\Pengguna\Service\PenggunaService;
use App\Modules\Pengumuman\Service\PengumumanService;
use App\Modules\Perkuliahan\Entity\Roster;
use App\Modules\Perkuliahan\Service\KehadiranService;
use App\Modules\Perkuliahan\Service\KurikulumService;
use App\Modules\Perkuliahan\Service\MatakuliahService;
use App\Modules\Perkuliahan\Service\NilaiService;
use App\Modules\Perkuliahan\Service\RosterService;
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
        new KurikulumService(new KurikulumData(), new PengambilanMatakuliahData());
        new NilaiService(new NilaiData());
        new KehadiranService(new KehadiranData());
        new RosterService(new RosterData());
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
