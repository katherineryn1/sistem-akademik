<?php

namespace App\Providers;

use App\Models\DosenData;
use App\Models\MahasiswaData;
use App\Models\PengumumanData;
use App\Models\PengumumanORM;
use App\Models\User;
use App\Modules\Dosen\Service\DosenService;
use App\Modules\Mahasiswa\Service\MahasiswaService;
use App\Modules\Pengguna\Service\PenggunaService;
use App\Modules\Pengumuman\Service\PengumumanService;
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
