<?php


namespace App\Modules\Perkuliahan\Helper;


use App\Modules\Common\CommonAdapter;
use App\Modules\Perkuliahan\Helper\PengambilanMatakuliahBuilder;
use App\Modules\Perkuliahan\Entity\Kehadiran;

class KehadiranAdapter implements CommonAdapter{
    public static function EntityToDictionary(Object $object): array {
        if(!($object instanceof Kehadiran)){
            return [];
        }
        return [
            'id' => $object->getId(),
            'keterangan' => $object->getKeterangan(),
            'id_pengambilan_matakuliah' => $object->getPengguna()->getId()
        ];
    }

    public static function DictionaryToEntity(array $object): object
    {
        $kehadiran = new Kehadiran();
        $kehadiran->setId($object['id']);
        $kehadiran->setPengguna(PengambilanMatakuliahBuilder::setId($object['id_pengambilan_matakuliah'])::get());
        $kehadiran->setKeterangan($object['keterangan']);
        return $kehadiran;
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
