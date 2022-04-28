<?php


namespace App\Modules\Perkuliahan\Helper;


use App\Modules\Perkuliahan\Entity\Roster;

final class RosterBuilder{
    private static Roster $roster;

    public static function setId(int $id){
        self::$roster = new Roster();
        self::$roster->setId($id);
        return new static();
    }

    public static  function get(){
        return self::$roster;
    }
}
