<?php


namespace App\Modules\Perkuliahan\Helper;


use App\Modules\Common\CommonAdapter;

use App\Modules\Perkuliahan\Entity\Nilai;



class NilaiAdapter implements CommonAdapter{


    public static function EntityToDictionary(object $object): array
    {
        if(!($object instanceof Nilai)){
            return [];
        }
        return [
            'id' => $object->getId(),
            'nilai_1' => $object->getNilai1(),
            'nilai_2' => $object->getNilai2(),
            'nilai_3' => $object->getNilai3(),
            'nilai_4' => $object->getNilai4(),
            'nilai_5' => $object->getNilai5(),
            'nilai_UAS' => $object->getNilaiUAS(),
            'nilai_akhir' => $object->getNilaiAkhir(),
            'index' => $object->getIndex(),
            'pengambilan_matakuliah' => $object->getPengambilanMatakuliah()->getId(),
        ];
    }

    public static function DictionaryToEntity(array $object): object
    {
        $nilai = new Nilai();
        $nilai->setId($object['id']);
        $nilai->setNilai1( $object['nilai_1']);
        $nilai->setNilai2($object['nilai_2']);
        $nilai->setNilai3($object['nilai_3']);
        $nilai->setNilai4($object['nilai_4']);
        $nilai->setNilai5($object['nilai_5']);
        $nilai->setNilaiUAS($object['nilai_UAS']);
        $nilai->setNilaiAkhir($object['nilai_akhir']);
        $nilai->setIndex($object['index']);
        $nilai->setPengambilanMatakuliah(PengambilanMatakuliahBuilder::setId($object['pengambilan_matakuliah'])::get());
        return $nilai;
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
