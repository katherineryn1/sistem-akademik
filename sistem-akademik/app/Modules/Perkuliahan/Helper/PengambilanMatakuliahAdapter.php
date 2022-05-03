<?php


namespace App\Modules\Perkuliahan\Helper;


use App\Modules\Common\CommonAdapter;
use App\Modules\Pengguna\Helper\PenggunaBuilder;
use App\Modules\Perkuliahan\Entity\PengambilanMatakuliah;
use App\Modules\Perkuliahan\Entity\PosisiAmbilPengambilanMatakuliah;

class PengambilanMatakuliahAdapter implements CommonAdapter{

    public static function EntityToDictionary(object $object): array
    {
        if(!($object instanceof PengambilanMatakuliah)){
            return [];
        }
        return [
            'id' => $object->getId(),
            'nomor_induk' => $object->getPengguna()->getNomorInduk(),
            'posisi_ambil' => $object->getPosisiAmbil(),
        ];
    }

    public static function DictionaryToEntity(array $object): object
    {
        $pengambilanMK = new PengambilanMatakuliah();
        $pengambilanMK->setId($object['id']);
        $pengambilanMK->setPengguna(PenggunaBuilder::setNomorInduk($object['nomor_induk'])::get());
        $pengambilanMK->setPosisiAmbil(PosisiAmbilPengambilanMatakuliah::getEnumBy($object['posisi_ambil']));
        return $pengambilanMK;
    }

    public static function ArrayEntitiesToDictionaries(array $object): array
    {
        $tempArr = Array();
        foreach ($object as $value) {
            array_push($tempArr,self::EntityToDictionary($value));
        }
        return  $tempArr;
    }

    public static function ArrayDictionariesToEntities(array $object): array
    {
        $tempArr = Array();
        foreach ($object as $value) {
            array_push($tempArr,self::DictionaryToEntity($value));
        }
        return  $tempArr;
    }
}
