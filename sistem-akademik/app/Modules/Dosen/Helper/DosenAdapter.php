<?php


namespace App\Modules\Dosen\Helper;


use App\Modules\Common\CommonAdapter;

use App\Modules\Dosen\Entity\Dosen;
use App\Modules\Pengguna\Helper\PenggunaAdapter;


class DosenAdapter implements CommonAdapter{

    public static function EntityToDictionary(Object $object): array {
        if(!($object instanceof  Dosen)){
            return [];
        }
        return  array_merge(
            PenggunaAdapter::EntityToDictionary($object)
        ,
        [
            'program_studi' => $object->getProgramStudi(),
            'bidang_ilmu' => $object->getBidangIlmu(),
            'gelar_akademik' => $object->getGelarAkademik(),
            'status_ikatan_kerja' => $object->getStatusIkatanKerja(),
            'status_dosen' => $object->getStatusDosen(),
        ]);
    }

    public static function DictionaryToEntity(array $object): object {
        $dosen = new Dosen();
        $dosen->setNomorInduk($object['nomor_induk']);
        $dosen->setProgramStudi($object['program_studi']);
        $dosen->setBidangIlmu($object['bidang_ilmu']);
        $dosen->setGelarAkademik($object['gelar_akademik']);
        $dosen->setStatusIkatanKerja($object['status_ikatan_kerja']);
        $dosen->setStatusDosen($object['status_dosen']);
        return $dosen;
    }

    public static function ArrayEntitiesToDictionaries(array $object): array{
        $tempArr = Array();
        foreach ($object as $value) {
            array_push($tempArr,self::EntityToDictionary($value));
        }
        return  $tempArr;
    }

    public static function ArrayDictionariesToEntities(array $object): array{
        $tempArr = Array();
        foreach ($object as $value) {
            array_push($tempArr,self::DictionaryToEntity($value));
        }
        return  $tempArr;
    }
}
