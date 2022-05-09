<?php
namespace App\Modules\Perkuliahan\Helper;


use App\Modules\Perkuliahan\Entity\Kehadiran;

final class KehadiranBuilder{
    private static Kehadiran $kehadiran;

    public static function setId(int $id){
        self::$kehadiran = new Kehadiran();
        self::$kehadiran->setId($id);
        return new static();
    }

    public static  function get(){
        return self::$kehadiran;
    }
}
