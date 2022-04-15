<?php


namespace App\Modules\Mahasiswa\Helper;


use App\Modules\Common\CommonAdapter;
use App\Modules\Mahasiswa\Entity\Mahasiswa;
use App\Modules\Pengguna\Helper\PenggunaAdapter;

class MahasiswaAdapter implements CommonAdapter {
    public static function EntityToDictionary(Object $object): array {
        if(!($object instanceof Mahasiswa)){
            return [];
        }
        return  array_merge(
            PenggunaAdapter::EntityToDictionary($object)
        ,
        [
           'jurusan' => $object->getJurusan(),
           'tahun_masuk' => $object->getTahunMasuk(),
           'tahun_lulus' => $object->getTahunLulus(),
        ]);
    }

    public static function DictionaryToEntity($object): object
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->setNomorInduk($object['nomor_induk']);
        $mahasiswa->setJurusan($object['jurusan']);
        $mahasiswa->setTahunMasuk($object['tahun_masuk']);
        $mahasiswa->setTahunLulus($object['tahun_lulus']);
        return $mahasiswa;
    }

    public static function ArrayEntitiesToDictionaries($object): array
    {
        $tempArr = Array();
        foreach ($object as $value) {
            array_push($tempArr,self::EntityToDictionary($value));
        }
        return  $tempArr;
    }

    public static function ArrayDictionariesToEntities($object): array
    {
        $tempArr = Array();
        foreach ($object as $value) {
            array_push($tempArr,self::DictionaryToEntity($value));
        }
        return  $tempArr;
    }
}
