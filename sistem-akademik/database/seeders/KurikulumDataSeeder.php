<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class KurikulumDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kurikulum_data')->insert([
            'tahun'             => 2022,
            'semester'          => 1,
            'kelas'             => 'A',
            'jumlah_pertemuan'  => 14,
            'kode_matakuliah'   => 'IF-601'
        ]);
        DB::table('kurikulum_data')->insert([
            'tahun'             => 2022,
            'semester'          => 1,
            'kelas'             => 'A',
            'jumlah_pertemuan'  => 0,
            'kode_matakuliah'   => 'IF-801'
        ]);
        DB::table('kurikulum_data')->insert([
            'tahun'             => 2022,
            'semester'          => 1,
            'kelas'             => 'A',
            'jumlah_pertemuan'  => 14,
            'kode_matakuliah'   => 'IF-902'
        ]);
    }
}
