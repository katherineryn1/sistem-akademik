<?php

namespace Tests\Modules\Dosen\Service;

use App\Modules\Dosen\Service\DosenService;
use App\Modules\Pengguna\Service\PenggunaService;
use Tests\TestCase;


class DosenServiceTest extends TestCase{
    public function testInsert(){
        $nama = "Test Dosen";
        $password = "12345678";
        $nomorInduk = "2099002";
        $email = "dosen@test.com";
        $tanggalLahir = "10/16/2003";
        $tempatLahir= "Bali";
        $jenisKelamin ="L";
        $alamat ="Dipatiukur";
        $notelepon ="086537956";
        $jabatan ="Dosen";
        $programstudi = "Informatika";
        $bidangIlmu = 'Teknologi';
        $gelarAkademik = "Master";
        $stausIkatanKerja = "Honorer";
        $statusDosen = "Aktif";

        $res = DosenService::insert($nama,$password,  $nomorInduk, $email, $tanggalLahir, $tempatLahir,
            $jenisKelamin, $alamat,$notelepon, $jabatan,$jabatan,$programstudi,$bidangIlmu,
            $gelarAkademik, $stausIkatanKerja,$statusDosen );
        self::assertEquals(true,$res);
    }
    public function testGetAll(){
        $data = DosenService::getAll();
        print_r($data);
        self::assertGreaterThan(0, count($data));
    }
    public function testUpdate(){
        $nomorInduk = "2099002";
        $programstudi = "Update Sistem Informasi";
        $bidangIlmu = 'Teknologi';
        $gelarAkademik = "Master";
        $stausIkatanKerja = "Honorer";
        $statusDosen = true;
        $status = DosenService::update($nomorInduk, $programstudi,$bidangIlmu,
            $gelarAkademik, $stausIkatanKerja,$statusDosen);
        self::assertEquals(true,$status);
    }
    public function testDosenInfo(){
        $data = DosenService::dosenInfo("nomor_induk", "2099002");
        self::assertGreaterThan(0, count($data));
    }
    public function testDelete(){
        $nomorInduk = "2099002";
        $status = DosenService::delete($nomorInduk);
        self::assertEquals(true,$status);
        PenggunaService::delete($nomorInduk);
    }
}
