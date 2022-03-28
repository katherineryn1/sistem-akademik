<?php

namespace Tests\Modules\Pengumuman\Service;

use App\Models\PengumumanData;
use App\Modules\Pengumuman\Service\PengumumanService;
use Tests\TestCase;

class PengumumanServiceTest extends TestCase
{
   public function testInsert(){
        $judul= "Pengumuman Test 10";
        $keterangan = "Harap diperhatikan ....";
        $tanggal = "11/10/2021";
        $hasil  = PengumumanService::insert($judul,$keterangan, $tanggal);
        self::assertEquals(true,$hasil);
    }

    public function testGetPengumumanByInfo(){
        $data = PengumumanService::getPengumumanByInfo("judul",  "Pengumuman Test 10");
        self::assertGreaterThan(0, count($data));
    }

    public function testGetAll(){
        $data = PengumumanService::getAll();
        self::assertGreaterThan(0, count($data));
    }

    public function testUpdate(){
        $data = PengumumanService::getPengumumanByInfo("judul",  "Pengumuman Test 10");
        self::assertGreaterThan(0, count($data));
        $data[0]['judul'] = "Update " . $data[0]['judul'];
        $hasil = PengumumanService::update($data[0]['id'],$data[0]['judul'],$data[0]['keterangan'],$data[0]['tanggal']->format('Y-m-d'));
        self::assertEquals(true,$hasil);
    }


    public function testDelete(){
        $data = PengumumanService::getPengumumanByInfo("judul",  "Update Pengumuman Test 10");
        self::assertGreaterThan(0, count($data));
        $hasil = PengumumanService::delete($data[0]['id']);
        self::assertEquals(true,$hasil);
    }
}
