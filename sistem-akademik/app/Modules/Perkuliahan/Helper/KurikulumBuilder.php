<?php


namespace App\Modules\Perkuliahan\Helper;


use App\Modules\Perkuliahan\Entity\Kurikulum;

class KurikulumBuilder{
    private static Kurikulum $kurikulum;

    public static function setId(int $id){
        self::$kurikulum = new Kurikulum();
        self::$kurikulum->setId($id);
        return new static();
    }

    public static  function get(){
       return self::$kurikulum;
    }
}
