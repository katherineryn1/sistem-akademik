<?php

namespace App\Providers;

use App\Models\PengumumanData;
use App\Models\PengumumanORM;
use App\Models\User;
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
