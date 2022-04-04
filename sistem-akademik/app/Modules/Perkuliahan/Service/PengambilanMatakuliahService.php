<?php


namespace App\Modules\Perkuliahan\Service;


use App\Modules\Common\PenggunaBuilder;
use App\Modules\Perkuliahan\Entity\PengambilanMatakuliah;
use App\Modules\Perkuliahan\Persistence\PengambilanMatakuliahPersistence;

class PengambilanMatakuliahService{
    private static PengambilanMatakuliahPersistence $pm;

    function __construct(PengambilanMatakuliahPersistence $pm){
        self::$pm  = $pm;
    }

    function __destruct(){
    }

    /**
     * @param string $nomor_induk
     * @param string $posisiAmbil
     * @return bool
     */
    public static function insert(string  $nomorInduk,string $posisiAmbil,int $kurikulum):bool {
        $newPengambilan = new PengambilanMatakuliah();
        $newPengambilan->setPengguna(PenggunaBuilder::setNomorInduk($nomorInduk)::get());
        $newPengambilan->setPosisiAmbil($posisiAmbil);
        return self::$pm->insertSingle($newPengambilan,$kurikulum);
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
    public static function pengambilanMatakuliahByInfo(string $attribute,string $value): array{
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
