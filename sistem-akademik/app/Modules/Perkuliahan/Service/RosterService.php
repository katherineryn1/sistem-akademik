<?php
namespace App\Modules\Perkuliahan\Service;
use DateTime;
use App\Modules\Perkuliahan\Entity\Roster;
use App\Modules\Perkuliahan\Persistence\RosterPersistence;

class RosterService {
    private static RosterPersistence $pm;

    function __construct(RosterPersistence $pm){
        self::$pm = $pm;
    }

    function __destruct(){
    }

    /**
     * @param string $kode
     * @param string $nama
     * @param string $jenis
     * @param string $sifat
     * @param int $sks
     * @return bool
     */
    public static function insert(int $kurikulum,DateTime $tanggal, string $jamMulai, string $jamSelesai, string $ruangan):bool {
        $newRoster = new Roster();
        $newRoster->setTanggal($tanggal);
        $newRoster->setJamMulai($jamMulai);
        $newRoster->setJamSelesai($jamSelesai);
        $newRoster->setRuangan($ruangan);
        return self::$pm->insertSingle($newRoster,$kurikulum);
    }

    /**
     * @param int $id
     * @param DateTime $tanggal
     * @param string $jamMulai
     * @param string $jamSelesai
     * @param string $ruangan
     * @return bool
     */
    public static function update(int $id, DateTime $tanggal, string $jamMulai, string $jamSelesai, string $ruangan):bool {
        $newRoster = new Roster();
        $newRoster->setId($id);
        $newRoster->setTanggal($tanggal);
        $newRoster->setJamMulai($jamMulai);
        $newRoster->setJamSelesai($jamSelesai);
        $newRoster->setRuangan($ruangan);
        return self::$pm->updateSingle($newRoster);
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
    public static function rosterByInfo(string $attribute,string $value): array{
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

    public static  function generateKehadiran(int $id):array {
        // Todo: Implement
    }

    public static  function destroyKehadiran(int $id):array {
        // Todo: Implement
    }

    public static function getAll():array {
        $found = self::$pm->getAll();
        if(count($found) <= 0){
            return [];
        }
        $dto = array();
        foreach ($found as $data) {
            array_push($dto, $data->getArray());
        }
        return $dto;
    }
}
?>
