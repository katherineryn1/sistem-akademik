<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class RosterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('roster_data')->insert([
            'tanggal'       => $faker->dateTimeBetween('-2 days', '+4 days'),
            'jam_mulai'     => '10:00',
            'jam_selesai'   => '12:00',
            'ruangan'       => 'Google Meet 5',
            'id_kurikulum'  => 3
        ]);
        DB::table('roster_data')->insert([
            'tanggal'       => $faker->dateTimeBetween('-2 days', '+4 days'),
            'jam_mulai'     => '12:00',
            'jam_selesai'   => '14:00',
            'ruangan'       => 'Google Meet 2',
            'id_kurikulum'  => 3
        ]);

        DB::table('roster_data')->insert([
            'tanggal'       => $faker->dateTimeBetween('-2 days', '+4 days'),
            'jam_mulai'     => '07:00',
            'jam_selesai'   => '10:00',
            'ruangan'       => 'Google Meet 3',
            'id_kurikulum'  => 1
        ]);
        DB::table('roster_data')->insert([
            'tanggal'       => $faker->dateTimeBetween('-2 days', '+4 days'),
            'jam_mulai'     => '14:00',
            'jam_selesai'   => '17:00',
            'ruangan'       => 'Google Meet 3',
            'id_kurikulum'  => 1
        ]);
    }
}
