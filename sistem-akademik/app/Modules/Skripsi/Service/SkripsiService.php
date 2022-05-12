<?php
namespace App\Modules\Skripsi\Service;


use App\Modules\Skripsi\Entity\Skripsi;
use App\Modules\Skripsi\Persistence\SkripsiPersistence;

class SkripsiService {
    private static SkripsiPersistence $pm;

    function __construct(SkripsiPersistence $pm){
        self::$pm = $pm;
    }

    function __destruct(){
    }

    /**
     * @param string $id
     * @param string $judul
     * @return bool
     */

    public static function insert(string $id, string $judul):bool{
        $newSkripsi = new Skripsi();
        $newSkripsi->setId($id);
        $newSkripsi->setJudul($judul);
        return self::$pm->insertSingle($newSkripsi);
    }

    /**
    * @param string $id
    * @return bool
    */
    public static function delete(string $id):bool {
        return  self::$pm->deleteSingle($id);
    }
}



?>
