<?php

namespace Tests\Modules\Perkuliahan\Service;

use App\Modules\Dosen\Service\DosenService;
use App\Modules\Perkuliahan\Service\KurikulumService;
use App\Modules\Perkuliahan\Service\PengambilanMatakuliahService;
use Tests\TestCase;

class PengambilanMatakuliahServiceTest extends TestCase
{

    public function testInsert() {
        $dataDosen = DosenService::getAll();
        self::assertGreaterThan(0, count($dataDosen));
        $dataKurikulum = KurikulumService::getAll();
        self::assertGreaterThan(0, count($dataKurikulum));

        $nomorInduk = $dataDosen[0]['nomor_induk'];
        $posisiAmbil = "Pengajar";
        $kurikulum =$dataKurikulum[0]['id'];

        $hasilInsert = PengambilanMatakuliahService::insert($nomorInduk,$posisiAmbil,$kurikulum);
        self::assertEquals(true,$hasilInsert);
    }

    public function testGetAll()  {
        $hasil = PengambilanMatakuliahService::getAll();
        print_r($hasil);
        self::assertGreaterThan(0, count($hasil));
    }

    public function testPengambilanMatakuliahByInfo() {

        $hasil = PengambilanMatakuliahService::pengambilanMatakuliahByInfo("id_kurikulum" , 1);
        print_r($hasil);
        self::assertGreaterThan(0, count($hasil));
    }

    public function testDelete() {
        $hasil = PengambilanMatakuliahService::getAll();
        self::assertGreaterThan(0, count($hasil));
        $idData = $hasil[0]['id'];
        $hasilDelete = PengambilanMatakuliahService::delete($idData);
        self::assertEquals(true,$hasilDelete);
    }

}
