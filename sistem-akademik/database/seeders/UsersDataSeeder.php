<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class UsersDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Dosen
        DB::table('users_data')->insert([
            'nomor_induk'   => '10171',
            'nama'          => $faker->name('female'),
            'email'         => 'if-10171@dosen.ithb.ac.id',
            'password'      => 'ithb2022',
            'tanggal_lahir' => $faker->dateTimeBetween('-60 years', '-30 years'),
            'tempat_lahir'  => 'Bandung',
            'jenis_kelamin' => 1,
            'alamat'        => $faker->address,
            'notelepon'    => $faker->phoneNumber,
            'jabatan'       => 0
        ]);
        DB::table('users_data')->insert([
            'nomor_induk'   => '10172',
            'nama'          => $faker->name('male'),
            'email'         => 'if-10172@dosen.ithb.ac.id',
            'password'      => 'ithb2022',
            'tanggal_lahir' => $faker->dateTimeBetween('-60 years', '-30 years'),
            'tempat_lahir'  => 'Surabaya',
            'jenis_kelamin' => 0,
            'alamat'        => $faker->address,
            'notelepon'    => $faker->phoneNumber,
            'jabatan'       => 0
        ]);
        DB::table('users_data')->insert([
            'nomor_induk'   => '10173',
            'nama'          => $faker->name('male'),
            'email'         => 'if-10173@dosen.ithb.ac.id',
            'password'      => 'ithb2022',
            'tanggal_lahir' => $faker->dateTimeBetween('-60 years', '-30 years'),
            'tempat_lahir'  => 'Jakarta',
            'jenis_kelamin' => 0,
            'alamat'        => $faker->address,
            'notelepon'    => $faker->phoneNumber,
            'jabatan'       => 0
        ]);

        // Mahasiswa
        DB::table('users_data')->insert([
            'nomor_induk'   => '1117001',
            'nama'          => $faker->name('male'),
            'email'         => 'if-1117001@students.ithb.ac.id',
            'password'      => 'ithb2022',
            'tanggal_lahir' => $faker->dateTimeBetween('-24 years', '-21 years'),
            'tempat_lahir'  => 'Garut',
            'jenis_kelamin' => 0,
            'alamat'        => $faker->address,
            'notelepon'    => $faker->phoneNumber,
            'jabatan'       => 1
        ]);
        DB::table('users_data')->insert([
            'nomor_induk'   => '1118001',
            'nama'          => $faker->name('female'),
            'email'         => 'if-1118001@students.ithb.ac.id',
            'password'      => 'ithb2022',
            'tanggal_lahir' => $faker->dateTimeBetween('-24 years', '-21 years'),
            'tempat_lahir'  => 'Palembang',
            'jenis_kelamin' => 1,
            'alamat'        => $faker->address,
            'notelepon'    => $faker->phoneNumber,
            'jabatan'       => 1
        ]);
        DB::table('users_data')->insert([
            'nomor_induk'   => '1118002',
            'nama'          => $faker->name('female'),
            'email'         => 'if-1118002@students.ithb.ac.id',
            'password'      => 'ithb2022',
            'tanggal_lahir' => $faker->dateTimeBetween('-24 years', '-21 years'),
            'tempat_lahir'  => 'Kupang',
            'jenis_kelamin' => 1,
            'alamat'        => $faker->address,
            'notelepon'    => $faker->phoneNumber,
            'jabatan'       => 1
        ]);

    }
}
