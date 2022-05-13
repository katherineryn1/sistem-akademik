<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersDataSeeder::class,
            PengumumanDataSeeder::class,
            DosenDataSeeder::class,
            MahasiswaDataSeeder::class,
            MatakuliahDataSeeder::class,
            KurikulumDataSeeder::class,
            PengambilanMatakuliahDataSeeder::class,
            RosterDataSeeder::class,
            KehadiranDataSeeder::class,
            NilaiDataSeeder::class,
            SkripsiDataSeeder::class,
            DetailSkripsiDataSeeder::class,
        ]);
    }
}
