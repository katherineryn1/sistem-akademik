<?php
namespace App\Modules\Perkuliahan\Service;
use App\Models\User;
use App\Modules\Pengguna\Entity\Pengguna;
use App\Modules\Perkuliahan\Persistence\KehadiranPersistence;
use DateTime;
use App\Modules\Perkuliahan\Entity\Kehadiran;

class KehadiranService {
    private static KehadiranPersistence $pm;

    function __construct(KehadiranPersistence $pm){
        self::$pm = $pm;
    }

    function __destruct(){
    }

    /**
     * @param string $keterangan
     * @param string $nomor_induk
     * @return bool
     */
    public static function insert(string  $keterangan,string $nomor_induk):bool {
        $newKehadiran = new Kehadiran();
        $newKehadiran->setKeterangan($keterangan);
        $user = new Pengguna();
        $user->setNomorInduk($nomor_induk);
        $newKehadiran->setUser($user);
        return self::$pm->insertSingle($newKehadiran);
    }

    /**
     * @param string $keterangan
     * @param string $nomor_induk
     * @return bool
     */
    public static function update(int $id,string  $keterangan,string $nomor_induk):bool {
        $newKehadiran = new Kehadiran();
        $newKehadiran->setId($id);
        $newKehadiran->setKeterangan($keterangan);
        $user = new Pengguna();
        $user->setNomorInduk($nomor_induk);
        $newKehadiran->setUser($user);
        return self::$pm->updateSingle($newKehadiran);
    }

    /**
     * @param string $id
     * @return bool
     */
    public static function delete(int $id):bool {
        return  self::$pm->deleteSingle($id);
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return array
     */
    public static function kehadiranByInfo(string $attribute,string $value): array{
        $found = self::$pm->getByAttribute([$attribute], [$value], ['=']);
        if(count($found) <= 0){
            return [];
        }
        $dto = array();
        foreach ($found as $data) {
            array_push($dto, $data->getArray());
        }
        return $dto;
    }

    public static function getAll():array {
        return  self::$pm->getAll();
    }
}
?>
