<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class NilaiDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nilai_data')->insert([
            'nilai_1'               => 70,
            'nilai_2'               => 93,
            'nilai_3'               => 72,
            'nilai_4'               => 80,
            'nilai_UAS'             => 80,
            'nilai_akhir'           => 81.45,
            'index'                 => 'A',
            'pengambilan_matakuliah'=> 9
        ]);
        DB::table('nilai_data')->insert([
            'nilai_1'               => 70,
            'nilai_2'               => 73,
            'nilai_3'               => 77,
            'nilai_UAS'             => 78,
            'nilai_akhir'           => 74.9,
            'index'                 => 'B+',
            'pengambilan_matakuliah'=> 10
        ]);
    }
}
