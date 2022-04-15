<?php


namespace App\Modules\Perkuliahan\Helper;

use DateTime;
use App\Modules\Common\CommonAdapter;
use App\Modules\Perkuliahan\Entity\Roster;

class RosterAdapter implements CommonAdapter{

    public static function EntityToDictionary(object $object): array
    {
        if(!($object instanceof Roster)){
            return [];
        }
        return [
            'id' => $object->getId(),
            'tanggal' => $object->getTanggal(),
            'jam_mulai' => $object->getJamMulai(),
            'jam_selesai' => $object->getJamSelesai(),
            'ruangan' => $object->getRuangan(),
            'kehadiran' => $object->getKehadiran(),
        ];
    }

    public static function DictionaryToEntity(array $object): object {
        $roster = new Roster();
        $roster->setId($object['id']);
        $roster->setJamMulai($object['jam_mulai']);
        $roster->setJamSelesai($object['jam_selesai']);
        $roster->setRuangan($object['ruangan']);
        $roster->setTanggal(new DateTime($object['tanggal']));
        return $roster;
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
