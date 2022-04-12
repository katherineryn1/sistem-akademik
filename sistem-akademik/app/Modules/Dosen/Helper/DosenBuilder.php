<?php


namespace App\Modules\Dosen\Helper;


use App\Modules\Dosen\Entity\Dosen;

class DosenBuilder{
    private static Dosen $dosen;

    public static function setNomorInduk(string $nomorInduk){
        self::$dosen = new Dosen();
        self::$dosen->setNomorInduk($nomorInduk);
        return new static();
    }

    public static function get(){
        return self::$dosen;
    }

}
