<?php

namespace Tests\Modules\Perkuliahan\Service;

use App\Modules\Pengguna\Service\PenggunaService;
use App\Modules\Perkuliahan\Service\KehadiranService;
use App\Modules\Perkuliahan\Service\RosterService;
use Tests\TestCase;

class KehadiranServiceTest extends TestCase
{

    public function testInsert() {
        $dataRoster = RosterService::getAll();
        self::assertGreaterThan(0, count($dataRoster));
        $dataPengguna = PenggunaService::getAll();
        self::assertGreaterThan(0, count($dataPengguna));
        $keterangan = "Sakit" ;
        $nomor_induk = $dataPengguna[0]['nomor_induk']  ;
        $roster = $dataRoster[0]['id'];
        $hasilInsert =  KehadiranService::insert($keterangan,$nomor_induk,$roster);
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
        $nomor_induk = $dataKehadiran[0]['pengguna']  ;
        $hasilUpdate =  KehadiranService::update($id,$keterangan,$nomor_induk);
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
