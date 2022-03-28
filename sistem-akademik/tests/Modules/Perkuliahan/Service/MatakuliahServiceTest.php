<?php

namespace Tests\Modules\Perkuliahan\Service;

use App\Modules\Perkuliahan\Service\MatakuliahService;
use Tests\TestCase;

class MatakuliahServiceTest extends TestCase
{

    public function testInsert(){
        $kode = "IF-001";
        $nama = "New Matakuliah";
        $jenis = "Insititusi";
        $sifat = "Wajib";
        $sks= 3;
        $res = MatakuliahService::insert($kode,$nama, $jenis, $sifat, $sks);
        self::assertEquals(true,$res);
    }

    public function testMatakuliahByInfo() {
        $data = MatakuliahService::matakuliahByInfo("kode", "IF-001");
        self::assertGreaterThan(0, count($data));
    }

    public function testUpdate(){
        $kode = "IF-001";
        $nama = "Update New Matakuliah";
        $jenis = "Insititusi";
        $sifat = "Wajib";
        $sks= 3;
        $res = MatakuliahService::update($kode,$nama, $jenis, $sifat, $sks);
        self::assertEquals(true,$res);
    }

    public function testGetAll()
    {
        $data = MatakuliahService::getAll();
        self::assertGreaterThan(0, count($data));
    }

    public function testDelete(){
        $kode = "IF-001";
        $status = MatakuliahService::delete($kode);
        self::assertEquals(true,$status);
    }

}
