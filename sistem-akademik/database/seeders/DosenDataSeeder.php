<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DosenDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosen_data')->insert([
            'nomor_induk'           => '10171',
            'program_studi'         => 'Informatika',
            'bidang_ilmu'           => 'Kecerdasan Buatan',
            'gelar_akademik'        => 'M.T.',
            'status_ikatan_kerja'   => 0,
            'status_dosen'          => 0
        ]);
        DB::table('dosen_data')->insert([
            'nomor_induk'           => '10172',
            'program_studi'         => 'Informatika',
            'bidang_ilmu'           => 'Rekayasa Perangkat Lunak',
            'gelar_akademik'        => 'M.T.',
            'status_ikatan_kerja'   => 0,
            'status_dosen'          => 0
        ]);
        DB::table('dosen_data')->insert([
            'nomor_induk'           => '10173',
            'program_studi'         => 'Informatika',
            'bidang_ilmu'           => 'Kecerdasan Buatan',
            'gelar_akademik'        => 'M.T.',
            'status_ikatan_kerja'   => 1,
            'status_dosen'          => 0
        ]);
    }
}
