<?php

namespace Tests\Modules\Perkuliahan\Service;

use App\Modules\Mahasiswa\Service\MahasiswaService;
use App\Modules\Perkuliahan\Service\KurikulumService;
use App\Modules\Perkuliahan\Service\NilaiService;
use Tests\TestCase;

class NilaiServiceTest extends TestCase{
    public function testInsert() {
        $dataKurikulum = KurikulumService::getAll();
        self::assertGreaterThan(0, count($dataKurikulum));
        $dataMahasiswa = MahasiswaService::getAll();
        self::assertGreaterThan(0, count($dataKurikulum));
        $kurikulum =$dataKurikulum[0]['id'];
        $nilai1 = 100;
        $nilai2 =100;
        $nilai3 = 80;
        $nilai4 =90;
        $nilai5 =75;
        $nilaiUAS = 80;
        $nilaiAkhir = 81;
        $index= 'A';
        $nomor_induk_mahasiswa = $dataMahasiswa[0]['nomor_induk'];
        $hasilInsert = NilaiService::insert($kurikulum,$nilai1, $nilai2,$nilai3,$nilai4,$nilai5, $nilaiUAS,$nilaiAkhir,$index,$nomor_induk_mahasiswa);
        self::assertEquals(true,$hasilInsert);
    }

    public function testGetAll() {
        $hasil = NilaiService::getAll();
        self::assertGreaterThan(0, count($hasil));
    }

    public function testUpdate() {
        $hasil = NilaiService::getAll();
        self::assertGreaterThan(0, count($hasil));
        $id = $hasil[0]['id'];
        $nilai1 = 0;
        $nilai2 =0;
        $nilai3 = 0;
        $nilai4 =0;
        $nilai5 =0;
        $nilaiUAS =0;
        $nilaiAkhir = 0;
        $index= '';
        $nomor_induk_mahasiswa = $hasil[0]['nomor_induk'];
        $hasilUpdate= NilaiService::update($id, $nilai1, $nilai2,$nilai3,$nilai4,$nilai5, $nilaiUAS,$nilaiAkhir,$index,$nomor_induk_mahasiswa);
        self::assertEquals(true,$hasilUpdate);
    }

    public function testNilaiByInfo() {
        $nomorInduk = "19999001";
        $hasil = NilaiService::nilaiByInfo("nomor_induk" , $nomorInduk );
        self::assertGreaterThan(0, count($hasil));
    }

    public function testDelete(){
        $hasil = NilaiService::getAll();
        self::assertGreaterThan(0, count($hasil));
        $hasilDelete = NilaiService::delete($hasil[0]['id']);
        self::assertEquals(true,$hasilDelete);
    }


}
