<?php

namespace App\Providers;

use App\Models\User;
use App\Modules\Pengguna\Service\PenggunaService;
use Illuminate\Support\ServiceProvider;

class PenggunaServiceProvider extends ServiceProvider
{
    public static $service;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PenggunaService::class, function($app){
            $eloquentORM = new User();
            PenggunaServiceProvider::$service = "hai";
            return new PenggunaService($eloquentORM) ;
            //return nil;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        return [PenggunaService::class];
    }
}
