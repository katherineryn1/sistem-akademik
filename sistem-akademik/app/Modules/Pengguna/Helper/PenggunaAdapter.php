<?php
namespace App\Modules\Pengguna\Helper;

use DateTime;
use App\Modules\Common\CommonAdapter;
use App\Modules\Pengguna\Entity\Pengguna;

class PenggunaAdapter implements CommonAdapter {
    public static function EntityToDictionary($object): array {
        if(!($object instanceof  Pengguna)){
            return [];
        }
        return [
            'nomor_induk' => $object->getNomorInduk(),
            'nama' => $object->getNama(),
            'email' => $object->getEmail(),
            'password' => $object->getPassword(),
            'tanggal_lahir' => $object->getTanggalLahir(),
            'tempat_lahir' => $object->getTempatLahir(),
            'jenis_kelamin' => $object->getJenisKelamin(),
            'alamat' =>  $object->getAlamat(),
            'notelepon' =>  $object->getNotelepon(),
            'fotoprofile' => $object->getFotoprofil(),
            'jabatan' => $object->getJabatan(),
        ];
    }

    public static function DictionaryToEntity($object): Pengguna {
        $pengguna = new Pengguna();
        $pengguna->setNomorInduk($object['nomor_induk']);
        $pengguna->setNama($object['nama']);
        $pengguna->setJabatan($object['jabatan']);
        $pengguna->setAlamat($object['alamat']);
        $pengguna->setPassword("");
        $pengguna->setEmail($object['email']);
        $pengguna->setFotoprofil($object['fotoprofile']);
        $pengguna->setJenisKelamin($object['jenis_kelamin']);
        $pengguna->setNotelepon($object['notelepon']);
        $pengguna->setTanggalLahir(new DateTime($object['tanggal_lahir']));
        $pengguna->setTempatLahir($object['tempat_lahir']);
        return $pengguna;
    }

    public static function ArrayEntitiesToDictionaries($object): array {
        $tempArr = Array();
        foreach ($object as $value) {
            array_push($tempArr,self::EntityToDictionary($value));
        }
        return  $tempArr;
    }

    public static function ArrayDictionariesToEntities($object): array {
        $tempArr = Array();
        foreach ($object as $value) {
            array_push($tempArr,self::DictionaryToEntity($value));
        }
        return  $tempArr;
    }
}
