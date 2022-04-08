<?php

namespace Tests\Modules\Perkuliahan\Service;

use App\Modules\Pengguna\Service\PenggunaService;
use App\Modules\Perkuliahan\Service\KehadiranService;
use App\Modules\Perkuliahan\Service\PengambilanMatakuliahService;
use App\Modules\Perkuliahan\Service\RosterService;
use Tests\TestCase;

class KehadiranServiceTest extends TestCase
{

    public function testInsert() {
        $dataRoster = RosterService::getAll();
        self::assertGreaterThan(0, count($dataRoster));
        $dataPengambilanMK = PengambilanMatakuliahService::getAll();
        self::assertGreaterThan(0, count($dataPengambilanMK));
        $ambilMK = $dataPengambilanMK[0]['id'];
        $keterangan = "Sakit" ;
        $roster = $dataRoster[0]['id'];
        $hasilInsert =  KehadiranService::insert($keterangan,$ambilMK ,$roster);
        self::assertEquals(true,$hasilInsert);
    }


    public function testGetAll(){
        $hasil = KehadiranService::getAll();
        self::assertGreaterThan(0, count($hasil));
    }

    public function testUpdate()
    {
        $dataKehadiran = KehadiranService::getAll();
        self::assertGreaterThan(0, count($dataKehadiran));
        $id = $dataKehadiran[0]['id'];
        $keterangan = "Izin"  ;
        $ambil_mk = $dataKehadiran[0]['id_pengambilan_matakuliah']  ;
        $hasilUpdate =  KehadiranService::update($id,$keterangan,$ambil_mk);
        self::assertEquals(true,$hasilUpdate);
    }

    public function testKehadiranByInfo() {
        $hasil = KehadiranService::kehadiranByInfo("keterangan" , "Izin");
        self::assertGreaterThan(0, count($hasil));
    }


    public function testDelete(){
        $hasil = KehadiranService::getAll();
        self::assertGreaterThan(0, count($hasil));
        $hasilDelete = KehadiranService::delete($hasil[0]['id']);
        self::assertEquals(true,$hasilDelete);
    }
}
