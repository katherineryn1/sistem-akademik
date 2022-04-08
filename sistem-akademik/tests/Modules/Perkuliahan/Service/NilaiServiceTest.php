<?php

namespace Tests\Modules\Perkuliahan\Service;

use App\Modules\Mahasiswa\Service\MahasiswaService;
use App\Modules\Perkuliahan\Service\KurikulumService;
use App\Modules\Perkuliahan\Service\NilaiService;
use App\Modules\Perkuliahan\Service\PengambilanMatakuliahService;
use Tests\TestCase;

class NilaiServiceTest extends TestCase{
    public function testInsert() {
        $dataKurikulum = KurikulumService::getAll();
        self::assertGreaterThan(0, count($dataKurikulum));
        $dataPengambilanMK = PengambilanMatakuliahService::getAll();
        self::assertGreaterThan(0, count($dataPengambilanMK));
        $kurikulum =$dataKurikulum[0]['id'];
        $nilai1 = 100;
        $nilai2 =100;
        $nilai3 = 80;
        $nilai4 =90;
        $nilai5 =75;
        $nilaiUAS = 80;
        $nilaiAkhir = 81;
        $index= 'A';
        $pengambilanMK = $dataPengambilanMK[0]['id'];
        $hasilInsert = NilaiService::insert($kurikulum,$nilai1, $nilai2,$nilai3,$nilai4,$nilai5, $nilaiUAS,$nilaiAkhir,$index,$pengambilanMK);
        self::assertEquals(true,$hasilInsert);
    }

    public function testGetAll() {
        $hasil = NilaiService::getAll();
        self::assertGreaterThan(0, count($hasil));
    }

    public function testUpdate() {
        $hasil = NilaiService::getAll();
        self::assertGreaterThan(0, count($hasil));
        $dataPengambilanMK = PengambilanMatakuliahService::getAll();
        self::assertGreaterThan(0, count($dataPengambilanMK));
        $id = $hasil[0]['id'];
        $nilai1 = 0;
        $nilai2 =0;
        $nilai3 = 0;
        $nilai4 =0;
        $nilai5 =0;
        $nilaiUAS =0;
        $nilaiAkhir = 0;
        $index= '';
        $pengambilanMK = $dataPengambilanMK[0]['id'];
        $hasilUpdate= NilaiService::update($id, $nilai1, $nilai2,$nilai3,$nilai4,$nilai5, $nilaiUAS,$nilaiAkhir,$index,$pengambilanMK);
        self::assertEquals(true,$hasilUpdate);
    }

    public function testNilaiByInfo() {
        $dataPengambilanMK = PengambilanMatakuliahService::getAll();
        self::assertGreaterThan(0, count($dataPengambilanMK));
        $ambilMK = $dataPengambilanMK[0]['id'];
        $hasil = NilaiService::nilaiByInfo("pengambilan_matakuliah" , $ambilMK );
        self::assertGreaterThan(0, count($hasil));
    }

    public function testDelete(){
        $hasil = NilaiService::getAll();
        self::assertGreaterThan(0, count($hasil));
        $hasilDelete = NilaiService::delete($hasil[0]['id']);
        self::assertEquals(true,$hasilDelete);
    }


}
