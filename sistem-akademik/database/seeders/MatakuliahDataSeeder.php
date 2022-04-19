<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MatakuliahDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matakuliah_data')->insert([
            'kode'  => 'IF-601',
            'nama'  => 'Rekayasa Perangkat Lunak Lanjut',
            'jenis' => 1,
            'sifat' => 0,
            'sks'   => 3
        ]);
        DB::table('matakuliah_data')->insert([
            'kode'  => 'IF-801',
            'nama'  => 'Skripsi',
            'jenis' => 1,
            'sifat' => 1,
            'sks'   => 6
        ]);
        DB::table('matakuliah_data')->insert([
            'kode'  => 'IF-802',
            'nama'  => 'Komputer dan Masyarakat',
            'jenis' => 1,
            'sifat' => 0,
            'sks'   => 2
        ]);
        DB::table('matakuliah_data')->insert([
            'kode'  => 'IF-901',
            'nama'  => 'Pemrograman Piranti Bergerak',
            'jenis' => 1,
            'sifat' => 1,
            'sks'   => 2
        ]);
        DB::table('matakuliah_data')->insert([
            'kode'  => 'IF-902',
            'nama'  => 'Natural Language Processing',
            'jenis' => 1,
            'sifat' => 1,
            'sks'   => 2
        ]);
    }
}
