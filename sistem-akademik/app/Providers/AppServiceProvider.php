<?php

namespace App\Providers;

use App\Models\DosenData;
use App\Models\PengumumanData;
use App\Models\PengumumanORM;
use App\Models\User;
use App\Modules\Dosen\Service\DosenService;
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
        PenggunaService::$pm = new User();
        PengumumanService::$pm = new PengumumanData();
        new DosenService(new DosenData());
        //DosenService::$pm =new DosenData();
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
