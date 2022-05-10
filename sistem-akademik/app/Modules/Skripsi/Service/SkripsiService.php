<?php
namespace App\Modules\Skripsi\Service;

use App\Modules\Dosen\Service\DosenService;
use App\Modules\Skripsi\Entity\Skripsi;
use App\Modules\Skripsi\Persistence\DetailSkripsiPersistence;
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
    * @param string $batasAkhir
    * @param string $file
    * @param bool $isTugasAkhir
    * @param string $milestone
    * @param string $matakuliah
    * @param string $m_Detail
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