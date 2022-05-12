<?php

namespace Tests\Modules\Perkuliahan\Service;

use DateTime;
use App\Modules\Perkuliahan\Service\KurikulumService;
use App\Modules\Perkuliahan\Service\NilaiService;
use App\Modules\Perkuliahan\Service\RosterService;
use Tests\TestCase;

class RosterServiceTest extends TestCase
{

    public function testInsert()  {
        $dataKurikulum = KurikulumService::getAll();
        self::assertGreaterThan(0, count($dataKurikulum));
        $kurikulum = $dataKurikulum[0]['id'];;
        $tanggal = new DateTime("22-08-2021");
        $jamMulai = "10:00";
        $jamSelesai = "12:00";
        $ruangan = "Lab";
        $hasilInsert =  RosterService::insert($kurikulum, $tanggal, $jamMulai, $jamSelesai, $ruangan);
        self::assertEquals(true,$hasilInsert);
    }
    public function testGetAll() {
        $hasil = RosterService::getAll();
        print_r($hasil);
        self::assertGreaterThan(0, count($hasil));
    }

    public function testUpdate(){
        $hasil = RosterService::rosterByInfo("tanggal" , "2021-08-22");
        self::assertGreaterThan(0, count($hasil));
        $id = $hasil[0]['id'];
        $tanggal = $hasil[0]['tanggal'];
        $jamMulai = $hasil[0]['jam_mulai'];
        $jamSelesai = $hasil[0]['jam_selesai'] ;
        $ruangan = $hasil[0]['ruangan'] . " Update";
        $hasilUpdate =  RosterService::update($id,$tanggal, $jamMulai, $jamSelesai, $ruangan);
        self::assertEquals(true,$hasilUpdate);

    }

    public function testRosterByInfo(){
        $hasil = RosterService::rosterByInfo("tanggal" , "2021-08-22");
        self::assertGreaterThan(0, count($hasil));
    }

    public function testDelete(){
        $hasil = RosterService::getAll();
        self::assertGreaterThan(0, count($hasil));
        $hasilDelete = RosterService::delete($hasil[0]['id']);
        self::assertEquals(true,$hasilDelete);

    }

    public function testGenerateKehadiran(){
        $hasil = RosterService::getAll();
        self::assertGreaterThan(0, count($hasil));
        $hasilGenerate = RosterService::generateKehadiran($hasil[0]['id'],3);
        self::assertEquals(true,$hasilGenerate);
    }
}
