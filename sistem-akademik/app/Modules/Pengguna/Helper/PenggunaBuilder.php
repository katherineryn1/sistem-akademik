<?php
namespace App\Modules\Pengguna\Helper;


use App\Modules\Pengguna\Entity\Pengguna;

class PenggunaBuilder{
    private static Pengguna $pengguna;

    public static function setNomorInduk(string $nomorInduk){
        self::$pengguna = new Pengguna();
        self::$pengguna->setNomorInduk($nomorInduk);
        return new static();
    }

    public static  function get(){
        return self::$pengguna;
    }
}
