<?php
namespace App\Modules\Perkuliahan\Service;


use App\Modules\Perkuliahan\Helper\NilaiAdapter;
use App\Modules\Perkuliahan\Helper\PengambilanMatakuliahBuilder;
use DateTime;
use App\Modules\Perkuliahan\Entity\Nilai;
use App\Modules\Perkuliahan\Persistence\NilaiPersistence;

class NilaiService {
    private static NilaiPersistence $pm;

    function __construct(NilaiPersistence $pm){
        self::$pm = $pm;
    }

    function __destruct(){
    }

    /**
     * @param int $kurikulum
     * @param float $nilai1
     * @param float $nilai2
     * @param float $nilai3
     * @param float $nilai4
     * @param float $nilai5
     * @param float $nilaiUAS
     * @param float $nilaiAkhir
     * @param string $index
     * @param string $pengambilan_mk
     * @return bool
     */
    public static function insert(int $kurikulum,float $nilai1, float $nilai2, float $nilai3, float $nilai4, float $nilai5, float $nilaiUAS, float $nilaiAkhir, string $index, string $pengambilan_mk):bool {
        $newNilai = new Nilai();
        $newNilai->setNilai1($nilai1);
        $newNilai->setNilai2($nilai2);
        $newNilai->setNilai3($nilai3);
        $newNilai->setNilai4($nilai4);
        $newNilai->setNilai5($nilai5);
        $newNilai->setNilaiUAS($nilaiUAS);
        $newNilai->setNilaiAkhir($nilaiAkhir);
        $newNilai->setIndex($index);
        $newNilai->setPengambilanMatakuliah(PengambilanMatakuliahBuilder::setId($pengambilan_mk)::get());
        return self::$pm->insertSingle($newNilai,$kurikulum);
    }

    /**
     * @param int $id
     * @param float $nilai1
     * @param float $nilai2
     * @param float $nilai3
     * @param float $nilai4
     * @param float $nilai5
     * @param float $nilaiUAS
     * @param float $nilaiAkhir
     * @param string $index
     * @param string $nomor_induk_mahasiswa
     * @return bool
     */
    public static function update(int $id,float $nilai1, float $nilai2, float $nilai3, float $nilai4, float $nilai5, float $nilaiUAS, float $nilaiAkhir, string $index,string $pengambilan_mk):bool {
        $updateNilai = new Nilai();
        $updateNilai->setId($id);
        $updateNilai->setNilai1($nilai1);
        $updateNilai->setNilai2($nilai2);
        $updateNilai->setNilai3($nilai3);
        $updateNilai->setNilai4($nilai4);
        $updateNilai->setNilai5($nilai5);
        $updateNilai->setNilaiUAS($nilaiUAS);
        $updateNilai->setNilaiAkhir($nilaiAkhir);
        $updateNilai->setIndex($index);
        $updateNilai->setPengambilanMatakuliah(PengambilanMatakuliahBuilder::setId($pengambilan_mk)::get());
        return self::$pm->updateSingle($updateNilai);
    }

    /**
     * @param int $id
     * @return bool
     */
    public static function delete(int $id):bool {
        return  self::$pm->deleteSingle($id);
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return array
     */
    public static function nilaiByInfo(string $attribute,string $value): array{
        $found = self::$pm->getByAttribute([$attribute], [$value], ['=']);
        if(count($found) <= 0){
            return [];
        }
        return NilaiAdapter::ArrayEntitiesToDictionaries($found);
    }

    public static function getAll():array {
        $found = self::$pm->getAll();
        if(count($found) <= 0){
            return [];
        }
        return NilaiAdapter::ArrayEntitiesToDictionaries($found);
    }
}
?>
