<?php

namespace Tests\Modules\Perkuliahan\Service;

use App\Modules\Perkuliahan\Service\KurikulumService;
use Tests\TestCase;

class KurikulumServiceTest extends TestCase
{
    public function testInsert(){
        $tahun = 2020 ;
        $semester = "Ganjil" ;
        $kelas = 'A';
        $jumlahPertemuan = 10;
        $kodeMatakuliah  = "IF-001";
        $res = KurikulumService::insert($tahun,$semester, $kelas,$jumlahPertemuan,$kodeMatakuliah);
        self::assertEquals(true,$res);
    }


    public function testGetAll() {
        $data = KurikulumService::getAll();
        print_r($data);
        self::assertGreaterThan(0, count($data));

    }

    public function testKurikulumByInfo() {
        $data = KurikulumService::kurikulumByInfo("tahun", "2020");
        self::assertGreaterThan(0, count($data));
    }

    public function testUpdate() {
        $data = KurikulumService::kurikulumByInfo("tahun", "2020");
        self::assertGreaterThan(0, count($data));

        $id = $data[0]["id"];
        $tahun = 2020 ;
        $semester = "Genap" ;
        $kelas = 'A';
        $jumlahPertemuan = 10;
        $nomorIndukDosen = "2099002";
        $kodeMatakuliah  = "IF-001";
        $res = KurikulumService::update($id, $tahun,$semester, $kelas,$jumlahPertemuan,$kodeMatakuliah);
        self::assertEquals(true,$res);
    }

    public function testAddDosen() {

    }

    public function testGetMahasiswa() {

    }

    public function testAddMahasiswa() {
        $idKurikulum = 1;
        $nomorIndukMahasiswa = "10171";
        $hasil = KurikulumService::addMahasiswa($idKurikulum,$nomorIndukMahasiswa);
        self::assertEquals(true,$hasil);
    }

    public function testRemoveMahasiswa()
    {

    }

    public function testDelete(){
        $data = KurikulumService::kurikulumByInfo("tahun", "2020");
        self::assertGreaterThan(0, count($data));
        $id = $data[0]["id"];
        $res = KurikulumService::delete($id);
        self::assertEquals(true,$res);
    }



}
