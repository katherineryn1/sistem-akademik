<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class DetailSkripsiDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('detail_skripsi_data')->insert([
            'id_skripsi' => 1,
            'label' => 'Bab 1',
            'komentar' => 'Cukup bagus, lanjut ke Bab 2',
            'is_accepted' => 1,
            'tanggal_accepted' => $faker->dateTimeBetween('-2 days', '+4 days')
        ]);

        DB::table('detail_skripsi_data')->insert([
            'id_skripsi' => 1,
            'label' => 'Bab 2',
            'komentar' => 'Masih kurang informasinya',
            'is_accepted' => 0,
            'tanggal_accepted' => null
        ]);
    }
}
