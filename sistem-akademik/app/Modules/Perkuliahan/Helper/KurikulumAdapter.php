<?php


namespace App\Modules\Perkuliahan\Helper;


use App\Modules\Common\CommonAdapter;
use App\Modules\Perkuliahan\Entity\Kurikulum;
use App\Modules\Perkuliahan\Entity\SemesterKurikulum;

class KurikulumAdapter implements CommonAdapter{

    public static function EntityToDictionary(Object $object): array
    {
        if(!($object instanceof Kurikulum)){
            return [];
        }
        return [
            'id' => $object->getId(),
            'tahun' => $object->getTahun(),
            'semester' => $object->getSemester(),
            'kelas' => $object->getKelas(),
            'jumlah_pertemuan' => $object->getJumlahPertemuan(),
            'kode_matakuliah' => ($object->getMatakuliah())->getKode(),
        ];
    }

    public static function DictionaryToEntity(array $object): object
    {
        $kurikulum = new Kurikulum();
        $kurikulum->setId($object['id']);
        $kurikulum->setTahun($object['tahun']);
        $kurikulum->setSemester(SemesterKurikulum::getEnumBy($object['semester']));
        $kurikulum->setKelas($object['kelas']);
        $kurikulum->setJumlahPertemuan($object['jumlah_pertemuan']);
        $kurikulum->setMatakuliahByKode($object['kode_matakuliah']);
        return $kurikulum;
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
