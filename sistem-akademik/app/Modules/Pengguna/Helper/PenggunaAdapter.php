<?php
namespace App\Modules\Pengguna\Helper;

use App\Modules\Pengguna\Service\PenggunaService;
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
            'foto_profile' => $object->getFotoprofil(),
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
        $pengguna->setFotoprofil($object['foto_profile']);
        $pengguna->setJenisKelamin($object['jenis_kelamin']);
        $pengguna->setNotelepon($object['notelepon']);
        $pengguna->setTanggalLahir(new DateTime($object['tanggal_lahir']));
        $pengguna->setTempatLahir($object['tempat_lahir']);
        return $pengguna;
    }

    public static function InjectPenggunaToDictionary($object): array {
        if(!array_key_exists('nomor_induk',$object)){
            return [];
        }
        $tempPengguna =  PenggunaService::userInfo("nomor_induk", $object['nomor_induk']);
        if(count($tempPengguna) == 0){
            return [];
        }
        $object['nama'] = $tempPengguna[0]['nama'];
        $object['email'] = $tempPengguna[0]['email'];
        $object['tanggal_lahir'] = $tempPengguna[0]['tanggal_lahir'];
        $object['tempat_lahir'] = $tempPengguna[0]['tempat_lahir'];
        $object['jenis_kelamin'] = $tempPengguna[0]['jenis_kelamin'];
        $object['alamat'] = $tempPengguna[0]['alamat'];
        $object['notelepon'] = $tempPengguna[0]['notelepon'];
        $object['foto_profile'] = $tempPengguna[0]['foto_profile'];
        $object['jabatan'] = $tempPengguna[0]['jabatan'];
        return $object;
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

    public static function ArrayInjectPenggunaDictionary($object): array {
        $objectNomorInduk  = Array() ;
        foreach ($object as $value) {
            if(!array_key_exists('nomor_induk',$value)){
                echo "Cannot Inject No Key";
                return [];
            }
            array_push($objectNomorInduk,$value['nomor_induk']);
        }
        $hasilData = PenggunaService::usersInfo("nomor_induk",$objectNomorInduk);
        $currIdx = 0;
        foreach ($hasilData as $tempPengguna) {
            $object[$currIdx]['nama'] = $tempPengguna['nama'];
            $object[$currIdx]['email'] = $tempPengguna['email'];
            $object[$currIdx]['tanggal_lahir'] = $tempPengguna['tanggal_lahir'];
            $object[$currIdx]['tempat_lahir'] = $tempPengguna['tempat_lahir'];
            $object[$currIdx]['jenis_kelamin'] = $tempPengguna['jenis_kelamin'];
            $object[$currIdx]['alamat'] = $tempPengguna['alamat'];
            $object[$currIdx]['notelepon'] = $tempPengguna['notelepon'];
            $object[$currIdx]['foto_profile'] = $tempPengguna['foto_profile'];
            $object[$currIdx]['jabatan'] = $tempPengguna['jabatan'];
            $currIdx++;
        }
        return  $object;
    }
}
