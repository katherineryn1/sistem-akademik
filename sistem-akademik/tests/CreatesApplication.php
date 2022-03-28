<?php

namespace Tests;

use App\Models\DosenData;
use App\Models\PengumumanData;
use App\Models\User;
use App\Modules\Dosen\Service\DosenService;
use App\Modules\Pengguna\Service\PenggunaService;
use App\Modules\Pengumuman\Service\PengumumanService;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();
        return $app;
    }
}
