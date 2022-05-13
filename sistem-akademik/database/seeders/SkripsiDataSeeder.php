<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SkripsiDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skripsi_data')->insert([
            'nik' => '10171',
            'nim' => '1118001',
            'judul' => 'Prediksi Kenaikan Harga Bursa',
            'batas_akhir' => 'Minggu depan',
            'file' => 'tempat penyimpanan file tersebut',
            'milestone' => 2,
            'is_accepted' => 1,
            'matakuliah' => 'IF-801'
        ]);

        DB::table('skripsi_data')->insert([
            'nik' => '10171',
            'nim' => '1118002',
            'judul' => 'Membandingkan Performa Aplikasi Smartphone Dengan Bahasa Pemrograman Berbeda',
            'batas_akhir' => 'Minggu depan',
            'file' => null,
            'milestone' => 0,
            'is_accepted' => 0,
            'matakuliah' => 'IF-801'
        ]);

        DB::table('skripsi_data')->insert([
            'nik' => '10172',
            'nim' => '1118001',
            'judul' => 'Ingin Nangis',
            'batas_akhir' => 'Minggu depan',
            'file' => null,
            'milestone' => 0,
            'is_accepted' => 0,
            'matakuliah' => 'IF-801'
        ]);
    }
}
