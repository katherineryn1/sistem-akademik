<?php


namespace App\Modules\Common;


use App\Modules\Pengumuman\Entity\Pengumuman;

class PengumumanBuilder{
    private static Pengumuman $pengumuman;

    public static function setId(int $id){
        self::$pengumuman = new Pengumuman();
        self::$pengumuman->setId($id);
        return new static();
    }

    public static  function get(){
        return self::$pengumuman;
    }
}
