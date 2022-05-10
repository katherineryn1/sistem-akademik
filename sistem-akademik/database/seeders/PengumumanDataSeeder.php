<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class PengumumanDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('pengumuman_data')->insert([
            'judul'         => 'Informasi Layanan Keuangan Untuk Mahasiswa dan Orangtua',
            'keterangan'    => 'Kepada seluruh mahasiswa ITHB dan HBBS<br><br>
            
            Kami informasikan bahwa layanan WhatsApp hotline keuangan Nomor 088219875499 sudah tidak digunakan per hari Jumat tanggal 24 September 2021 dan akan dialihkan melalui :<br>
            Email keuangan@ithb.ac.id<br>
            ITHB Services Portal services.ithb.ac.id<br><br>
            
            Demikian informasi ini kami sampaikan. Terima kasih atas perhatiannya.',
            'tanggal'       => $faker->dateTimeBetween('-1 week', '-1 day'),
        ]);
        DB::table('pengumuman_data')->insert([
            'judul'         => 'Pelaksanaan Kembali Perkuliahan Tatap Muka Terbatas Semester Genap 2021/2022',
            'keterangan'    => 'Kepada Yth.Seluruh Mahasiswa ITHB<br><br>
            Berdasarkan perkembangan situasi terkini Covid-19 di Kota Bandung, kami informasikan bahwa mulai hari Senin tanggal 21 Maret 2022, Perkuliahan Tatap Muka Terbatas akan kembali dilaksanakan di Institut Teknologi Harapan Bangsa. Mata kuliah dan jadwal perkuliahan tatap muka dapat dilihat pada Roster Perkuliahan di SIA maupun di MyITHB. Kuliah tatap muka yang dilaksanakan tetap mengacu kepada protokol kesehatan yang berlaku.<br><br>
            
            Kami sampaikan kembali Panduan Perkuliahan Tatap Muka Terbatas di https://bit.ly/3CZG5sZ untuk dilaksanakan dengan baik oleh seluruh mahasiswa.<br><br>
            
            Demikian informasi yang dapat kami sampaikan. Atas perhatian yang diberikan kami ucapkan terima kasih.',
            'tanggal'       => $faker->dateTimeBetween('-1 week', '-1 day'),
        ]);
        DB::table('pengumuman_data')->insert([
            'judul'         => 'Pengumuman Syarat Kerja Praktik',
            'keterangan'    => 'Kepada Seluruh Mahasiswa ITHB dan HBBS,<br><br>

            Bagi mahasiswa yang mengambil mata kuliah Kerja Praktik atau Internship di semester Genap 2020-2021 wajib menyelesaikan CV sesuai standar ITHB sebagai syarat mengikuti seminar Kerja Praktik atau Internship.',
            'tanggal'       => $faker->dateTimeBetween('-1 week', '-1 day'),
        ]);
    }
}
