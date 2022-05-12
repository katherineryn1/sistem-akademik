<?php

namespace Tests\Modules\Pengguna\Service;

use App\Models\User;
use App\Modules\Pengguna\Service\PenggunaService;
use Tests\TestCase;

class PenggunaServiceTest extends TestCase{
    public function testInsert(){
        $nama = "newUser";
        $password = "12345678";
        $nomorInduk = "19999002";
        $email = "newUser@test.com";
        $tanggalLahir = "10/16/2003";
        $tempatLahir= "Bali";
        $jenisKelamin ="L";
        $alamat ="Dipatiukur";
        $notelepon ="086537956";
        $jabatan ="DAAK";
        $hasil = PenggunaService::insert($nama,$password,  $nomorInduk, $email, $tanggalLahir,
                                    $tempatLahir,$jenisKelamin, $alamat,$notelepon, $jabatan, "");
        self::assertEquals(true,$hasil);
    }
    public function testLogin() {
        $email = "if-10171@dosen.ithb.ac.id";
        $password = "ithb2022";
        $this->assertEquals(true,PenggunaService::login($email,$password));
    }

    public function testResetPassword(){
        $email = "newUser@test.com";
        self::assertEquals(true,PenggunaService::resetPassword($email));
    }

    public function testGantiPassword(){
        $email = "newUser@test.com";
        $password = 'newPWD';
        self::assertEquals(true,PenggunaService::gantiPassword($email,$password));
        $this->testLogin($password);
    }

    public function testUpdate(){
        $nama = "newUserUpdate";
        $password = "12345678";
        $nomorInduk = "19999002";
        $email = "newUser@gmail.com";
        $tanggalLahir = "10/16/2003";
        $tempatLahir= "Bali";
        $jenisKelamin ="L";
        $alamat ="Dipatiukur";
        $notelepon ="086537956";
        $jabatan ="Mahasiswa";

        $hasil = PenggunaService::update($nama,$password,  $nomorInduk, $email, $tanggalLahir,
                                    $tempatLahir,$jenisKelamin, $alamat,$notelepon, $jabatan);
        self::assertEquals(true, $hasil);
    }

    public function testUserInfo() {
        $nomorInduk = "19999002";
        $hasil = PenggunaService::userInfo("nomor_induk", $nomorInduk);
        self::assertGreaterThan(0, count($hasil));
    }

    public function testGetAll(){
        $hasil = PenggunaService::getAll();
        print_r($hasil);
        var_dump($hasil);
        self::assertGreaterThan(0, count($hasil));
    }

    public function testDelete(){
        $nomorInduk = "19999002";
        $hasil = PenggunaService::delete($nomorInduk);
        self::assertEquals(true,$hasil);
    }
}
