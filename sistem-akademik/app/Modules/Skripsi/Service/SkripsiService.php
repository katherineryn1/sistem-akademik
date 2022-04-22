<?php
namespace App\Modules\Skripsi\Service;

use App\Modules\Dosen\Service\DosenService;
use App\Modules\Skripsi\Entity\Skripsi;
use App\Modules\Perkuliahan\Persistence\DetailSkripsiPersistence;
use App\Modules\Perkuliahan\Persistence\SkripsiPersistence;

class SkripsiService {
    // public function delete($id){
    //     $data = Skripsi::findOrFail($id);
    //     $data->delete();
    // }

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

    public static function insert(string $id, string $judul, string $batasAkhir, string $file, bool $isTugasAkhir, string $milestone, string $matakuliah):bool{
        $newSkripsi = new Skripsi();


    }
}



?>