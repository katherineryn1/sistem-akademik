<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PengambilanMatakuliahDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dosen
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '10171',
            'posisi_ambil'  => 0,
            'id_kurikulum'  => 1
        ]);
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '10173',
            'posisi_ambil'  => 0,
            'id_kurikulum'  => 1
        ]);
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '10171',
            'posisi_ambil'  => 0,
            'id_kurikulum'  => 2
        ]);
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '10172',
            'posisi_ambil'  => 0,
            'id_kurikulum'  => 2
        ]);
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '10171',
            'posisi_ambil'  => 0,
            'id_kurikulum'  => 3
        ]);
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '10173',
            'posisi_ambil'  => 0,
            'id_kurikulum'  => 3
        ]);

        // Mahasiswa
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '1117001',
            'posisi_ambil'  => 1,
            'id_kurikulum'  => 2
        ]);
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '1118001',
            'posisi_ambil'  => 1,
            'id_kurikulum'  => 2
        ]);
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '1118001',
            'posisi_ambil'  => 1,
            'id_kurikulum'  => 1
        ]);
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '1118002',
            'posisi_ambil'  => 1,
            'id_kurikulum'  => 1
        ]);
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '1118001',
            'posisi_ambil'  => 1,
            'id_kurikulum'  => 3
        ]);
        DB::table('pengambilan_matakuliah_data')->insert([
            'nomor_induk'   => '1118002',
            'posisi_ambil'  => 1,
            'id_kurikulum'  => 3
        ]);
    }
}
