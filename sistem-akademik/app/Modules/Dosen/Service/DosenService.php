<?php
namespace App\Modules\Dosen\Service;

use DateTime;
use App\Modules\Dosen\Entity\Dosen;
use App\Modules\Dosen\Persistence\DosenPersistence;
use App\Modules\Pengguna\Service\PenggunaService;

class DosenService {
    private static DosenPersistence $pm;

    function __construct(DosenPersistence $pm){
        self::$pm = $pm;
    }

    function __destruct(){
    }

    /**
     * @param string $nomorInduk
     * @param string $programStudi
     * @param string $bidangIlmu
     * @param string $gelarAkademik
     * @param string $statusIkatanKerja
     * @param bool $statusDosen
     * @return bool
     */
    public static function insert(string  $nama,string $password, string $nomorInduk,string $email,
                                  string $tanggalLahir, string $tempatLahir,string $jenisKelamin, string  $alamat,
                                  string $notelepon, string $jabatan,string $programStudi,string $bidangIlmu,
                                  string $gelarAkademik,string $statusIkatanKerja,bool $statusDosen):bool {
        if(!PenggunaService::insert($nama,$password,  $nomorInduk, $email, $tanggalLahir, $tempatLahir,$jenisKelamin, $alamat,$notelepon, $jabatan)){
            return false;
        }
        $newDosen = new Dosen();
        $newDosen->setNomorInduk($nomorInduk);
        $newDosen->setProgramStudi($programStudi);
        $newDosen->setBidangIlmu($bidangIlmu);
        $newDosen->setGelarAkademik($gelarAkademik);
        $newDosen->setStatusIkatanKerja($statusIkatanKerja);
        $newDosen->setStatusDosen($statusDosen);

        return  self::$pm->insertSingle($newDosen);

    }

    /**
     * @param string $nama
     * @param string $password
     * @param string $nomorInduk
     * @param string $email
     * @param string $tanggalLahir
     * @param string $tempatLahir
     * @param string $jenisKelamin
     * @param string $alamat
     * @param string $notelepon
     * @param string $jabatan
     * @return bool
     * @throws \Exception
     */
    public static function update(string $nomorInduk,string $programStudi,string $bidangIlmu,
                                  string $gelarAkademik,string $statusIkatanKerja,bool $statusDosen):bool {
        $newDosen = new Dosen();
        $newDosen->setNomorInduk($nomorInduk);
        $newDosen->setProgramStudi($programStudi);
        $newDosen->setBidangIlmu($bidangIlmu);
        $newDosen->setGelarAkademik($gelarAkademik);
        $newDosen->setStatusIkatanKerja($statusIkatanKerja);
        $newDosen->setStatusDosen($statusDosen);

        return self::$pm->updateSingle($newDosen);
    }

    /**
     * @param string $nomorInduk
     * @return bool
     */
    public static function delete(string $nomorInduk):bool {
        return  self::$pm->deleteSingle($nomorInduk);
    }

    public static function dosenInfo(string $attribute,string $value): array{
        $found = self::$pm->getByAttribute([$attribute], [$value], ['=']);
        if(count($found) <= 0){
            return [];
        }
        $dto = array();
        foreach ($found as $data) {
            array_push($dto, $data->getArray());
        }
        return $dto;
    }

    public static function getAll():array {
        $found =  self::$pm->getAll();
        if(count($found) <= 0){
            return [];
        }
        $dto = array();
        foreach ($found as $data) {
            array_push($dto, $data->getArray());
        }
        return $dto;
    }


}
?>
