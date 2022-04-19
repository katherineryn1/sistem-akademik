<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MahasiswaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa_data')->insert([
            'nomor_induk'   => '1117001',
            'jurusan'       => 'Informatika',
            'tahun_masuk'   => 2017,
            'tahun_lulus'   => 2021
        ]);
        DB::table('mahasiswa_data')->insert([
            'nomor_induk'   => '1118001',
            'jurusan'       => 'Informatika',
            'tahun_masuk'   => 2018,
            'tahun_lulus'   => 2022
        ]);
        DB::table('mahasiswa_data')->insert([
            'nomor_induk'   => '1118002',
            'jurusan'       => 'Informatika',
            'tahun_masuk'   => 2018,
            'tahun_lulus'   => 2022
        ]);
    }
}
