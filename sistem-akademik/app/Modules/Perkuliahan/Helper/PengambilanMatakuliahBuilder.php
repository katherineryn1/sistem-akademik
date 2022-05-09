<?php
namespace App\Modules\Perkuliahan\Helper;


use App\Modules\Perkuliahan\Entity\PengambilanMatakuliah;

final class PengambilanMatakuliahBuilder{
    private static PengambilanMatakuliah $pengambilanMK;

    public static function setId(int $id){
        self::$pengambilanMK = new PengambilanMatakuliah();
        self::$pengambilanMK->setId($id);
        return new static();
    }

    public static  function get(){
        return self::$pengambilanMK;
    }

}
