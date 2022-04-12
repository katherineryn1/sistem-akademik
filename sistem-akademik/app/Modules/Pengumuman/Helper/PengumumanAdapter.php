<?php


namespace App\Modules\Pengumuman\Helper;


use App\Modules\Common\CommonAdapter;
use App\Modules\Pengumuman\Entity\Pengumuman;
use DateTime;

class PengumumanAdapter implements CommonAdapter{

    public static function EntityToDictionary(Object $object): array {
        if(!($object instanceof Pengumuman)){
            return [];
        }
        return [
            'id' => $object->getId(),
            'judul' => $object->getJudul(),
            'keterangan' => $object->getKeterangan(),
            'tanggal' => $object->getTanggal(),
        ];
    }

    public static function DictionaryToEntity(array $object): object
    {
        $pengumuman = new Pengumuman();
        $pengumuman->setId($object['id']);
        $pengumuman->setTanggal(new DateTime($object['tanggal']));
        $pengumuman->setKeterangan($object['keterangan']);
        $pengumuman->setJudul($object['judul']);
        return $pengumuman;
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
