<?php


namespace App\Modules\Perkuliahan\Helper;


use App\Modules\Common\CommonAdapter;
use App\Modules\Perkuliahan\Entity\Matakuliah;

class MatakuliahAdapter implements CommonAdapter{

    public static function EntityToDictionary(object $object): array {
        if(!($object instanceof Matakuliah)){
            return [];
        }
        return [
            'kode' => $object->getKode(),
            'nama' => $object->getNama(),
            'jenis' => $object->getJenis(),
            'sifat' => $object->getSifat(),
            'sks' => $object->getSks(),
        ];
    }

    public static function DictionaryToEntity(array $object): object
    {
        $matakuliah = new Matakuliah();
        $matakuliah->setKode($object['kode']);
        $matakuliah->setJenis($object['jenis']);
        $matakuliah->setNama($object['nama']);
        $matakuliah->setSifat($object['sifat']);
        $matakuliah->setSks($object['sks']);
        return $matakuliah;
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
