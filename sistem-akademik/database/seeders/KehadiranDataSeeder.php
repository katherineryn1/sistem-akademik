<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class KehadiranDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dosen
        DB::table('kehadiran_data')->insert([
            'keterangan'                => 0,
            'id_pengambilan_matakuliah' => 1,
            'id_roster'                 => 3
        ]);
        DB::table('kehadiran_data')->insert([
            'keterangan'                => 0,
            'id_pengambilan_matakuliah' => 1,
            'id_roster'                 => 4
        ]);
        DB::table('kehadiran_data')->insert([
            'keterangan'                => 0,
            'id_pengambilan_matakuliah' => 5,
            'id_roster'                 => 1
        ]);
        DB::table('kehadiran_data')->insert([
            'keterangan'                => 1,
            'id_pengambilan_matakuliah' => 6,
            'id_roster'                 => 2
        ]);

        // Mahasiswa
        DB::table('kehadiran_data')->insert([
            'keterangan'                => 3,
            'id_pengambilan_matakuliah' => 9,
            'id_roster'                 => 3
        ]);
        DB::table('kehadiran_data')->insert([
            'keterangan'                => 0,
            'id_pengambilan_matakuliah' => 9,
            'id_roster'                 => 4
        ]);
        DB::table('kehadiran_data')->insert([
            'keterangan'                => 0,
            'id_pengambilan_matakuliah' => 10,
            'id_roster'                 => 3
        ]);
        DB::table('kehadiran_data')->insert([
            'keterangan'                => 2,
            'id_pengambilan_matakuliah' => 10,
            'id_roster'                 => 4
        ]);
    }
}
