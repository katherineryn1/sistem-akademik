<?php


namespace App\Modules\Common;


use App\Modules\Perkuliahan\Entity\Nilai;

class NilaiBuilder{
    private static Nilai $nilai;

    public static function setId(int $id){
        self::$nilai = new Nilai();
        self::$nilai->setId($id);
        return new static();
    }

    public static  function get(){
        return self::$nilai;
    }

}
