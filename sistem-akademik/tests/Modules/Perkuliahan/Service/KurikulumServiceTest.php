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
        $idKurikulum = 1;
        $nomorIndukMahasiswa = "2099002";
        $hasil = KurikulumService::addDosen($idKurikulum,$nomorIndukMahasiswa);
        self::assertEquals(true,$hasil);
    }

    public function testGetMahasiswa() {
        $data = KurikulumService::getMahasiswa(1);
        print_r($data);
        self::assertGreaterThan(0, count($data));

    }

    public function testGetDosen() {
        $data = KurikulumService::getDosen(1);
        print_r($data);
        self::assertGreaterThan(0, count($data));
    }

    public function testAddMahasiswa() {
        $idKurikulum = 1;
        $nomorIndukMahasiswa = "19999001";
        $hasil = KurikulumService::addMahasiswa($idKurikulum,$nomorIndukMahasiswa);
        self::assertEquals(true,$hasil);
    }

    public function testRemoveMahasiswa(){
        $idKurikulum = 1;
        $nomorIndukMahasiswa = "19999001";
        $hasil = KurikulumService::removeMahasiswa($idKurikulum,$nomorIndukMahasiswa);
        self::assertEquals(true,$hasil);
    }

    public function testRemoveDosen(){
        $idKurikulum = 1;
        $nomorIndukDosen = "2099002";
        $hasil = KurikulumService::removeDosen($idKurikulum,$nomorIndukDosen);
        self::assertEquals(true,$hasil);
    }

    public function testGenerateRoster(){
        $res = KurikulumService::generateRoster(1, 1);
        self::assertEquals(true,$res);
    }

    public function testDelete(){
        $data = KurikulumService::kurikulumByInfo("tahun", "2020");
        self::assertGreaterThan(0, count($data));
        $id = $data[0]["id"];
        $res = KurikulumService::delete($id);
        self::assertEquals(true,$res);
    }



}
