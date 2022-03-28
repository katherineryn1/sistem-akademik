<?php
namespace App\Modules\Perkuliahan\Service;
use DateTime;
use App\Modules\Perkuliahan\Entity\Matakuliah;
use App\Modules\Perkuliahan\Persistence\MatakuliahPersistence;

class MatakuliahService {
    private static MatakuliahPersistence $pm;

    function __construct(MatakuliahPersistence $pm){
        self::$pm = $pm;
    }

    function __destruct(){
    }

    /**
     * @param string $kode
     * @param string $nama
     * @param string $jenis
     * @param string $sifat
     * @param int $sks
     * @return bool
     */
    public static function insert(string  $kode,string $nama, string $jenis, string $sifat, int $sks):bool {
        $newMatakuliah = new Matakuliah();
        $newMatakuliah->setKode($kode);
        $newMatakuliah->setNama($nama);
        $newMatakuliah->setJenis($jenis);
        $newMatakuliah->setSifat($sifat);
        $newMatakuliah->setSks($sks);
        return self::$pm->insertSingle($newMatakuliah);
    }

    /**
     * @param string $kode
     * @param string $nama
     * @param string $jenis
     * @param string $sifat
     * @param int $sks
     * @return bool
     */
    public static function update(string  $kode,string $nama, string $jenis, string $sifat, int $sks):bool {
        $newMatakuliah = new Matakuliah();
        $newMatakuliah->setKode($kode);
        $newMatakuliah->setNama($nama);
        $newMatakuliah->setJenis($jenis);
        $newMatakuliah->setSifat($sifat);
        $newMatakuliah->setSks($sks);
        return self::$pm->updateSingle($newMatakuliah);
    }

    /**
     * @param string $id
     * @return bool
     */
    public static function delete(string $id):bool {
        return  self::$pm->deleteSingle($id);
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return array
     */
    public static function matakuliahByInfo(string $attribute,string $value): array{
        $found = self::$pm->getByAttribute([$attribute], [$value], ['=']);
        if(count($found) <= 0){
            return [];
        }
        $dto = array();
        foreach ($found as $data) {
            array_push($dto, $data->getArray());
        }
        return $dto;
    }

    public static function getAll():array {
        $found = self::$pm->getAll();
        if(count($found) <= 0){
            return [];
        }
        $dto = array();
        foreach ($found as $data) {
            array_push($dto, $data->getArray());
        }
        return $dto;
    }
}
?>
