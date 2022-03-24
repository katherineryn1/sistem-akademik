<?php
namespace App\Modules\Mahasiswa\Service;

use App\Modules\Mahasiswa\Entity\Mahasiswa;
use App\Modules\Mahasiswa\Persistence\DosenPersistence;

class DosenService {
    public static MahasiswaPersistence $pm;

    function __construct(MahasiswaPersistence $pm){
        $this->pm = $pm;
    }

    function __destruct(){
    }

    
    public static function insert():bool {
       // Todo: Implement
    }


    public static function update():bool {

        // Todo: Implement
    }


    public static function delete():bool {
        // Todo: Implement
    }

    public static function getSkripsi():bool {
        // Todo: Implement
    }

    public static function getAll():bool {

        // Todo: Implement
    }


}
?>
