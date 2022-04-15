<?php


namespace App\Modules\Mahasiswa\Helper;


use App\Modules\Mahasiswa\Entity\Mahasiswa;

class MahasiswaBuilder{
    private static Mahasiswa $mhs;

    public static function setNomorInduk(string $nomorInduk){
        self::$mhs = new Dosen();
        self::$mhs->setNomorInduk($nomorInduk);
        return new static();
    }

    public static function get(){
        return self::$mhs;
    }

}
