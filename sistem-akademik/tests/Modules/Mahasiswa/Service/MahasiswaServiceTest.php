<?php

namespace Tests\Modules\Mahasiswa\Service;

use App\Models\MahasiswaData;
use App\Modules\Mahasiswa\Service\MahasiswaService;
use Tests\TestCase;

class MahasiswaServiceTest extends TestCase
{
    public function testInsert()
    {
        $nama = "newMahasiswa";
        $password = "12345678";
        $nomorInduk = "19999001";
        $email = "newMahasiswa@test.com";
        $tanggalLahir = "10/16/2003";
        $tempatLahir= "Bali";
        $jenisKelamin ="L";
        $alamat ="Dipatiukur";
        $notelepon ="086537956";
        $jabatan = "Mahasiswa";
        $jurusan = "Teknik Informatika";
        $tahunMasuk = 2019;
	    $tahunLulus = 0;
        $hasil = MahasiswaService::insert($nama,$password,  $nomorInduk, $email, $tanggalLahir,
            $tempatLahir,$jenisKelamin, $alamat,$notelepon, $jabatan, $jurusan, $tahunMasuk,$tahunLulus);
        self::assertEquals(true,$hasil);
    }

    public function testGetAll()
    {
        $hasil = MahasiswaService::getAll();
        print_r($hasil);
        self::assertGreaterThan(0, count($hasil));
    }

    public function testUpdate()
    {
        $nomorInduk = "19999001";
        $jurusan = "Teknik Informatika";
        $tahunMasuk = 2019;
        $tahunLulus = 2023;
        $hasil = MahasiswaService::update( $nomorInduk, $jurusan, $tahunMasuk,$tahunLulus);
        self::assertEquals(true,$hasil);
    }

    public function testMahasiswaInfo()
    {
        $nomorInduk = "19999001";
        $hasil = MahasiswaService::mahasiswaInfo("nomor_induk",$nomorInduk );
        self::assertGreaterThan(0, count($hasil));
    }
    public function testDelete()
    {
        $nomorInduk = "19999001";
        $hasil = MahasiswaService::delete($nomorInduk);
        self::assertEquals(true,$hasil);
    }

}
