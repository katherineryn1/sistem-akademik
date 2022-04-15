<?php
namespace App\Modules\Perkuliahan\Helper;


use App\Modules\Perkuliahan\Entity\Matakuliah;


class MatakuliahBuilder{
    private static Matakuliah $matakuliah;

    public static function setKode(string $kode){
        self::$matakuliah = new Matakuliah();
        self::$matakuliah->setKode($kode);
        return new static();
    }

    public static  function get(){
        return self::$matakuliah;
    }
}
