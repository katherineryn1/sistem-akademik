<?php
namespace App\Modules\Perkuliahan\Service;
use App\Modules\Perkuliahan\Entity\KeteranganKehadiran;
use App\Modules\Perkuliahan\Helper\PengambilanMatakuliahBuilder;
use App\Modules\Perkuliahan\Helper\KehadiranAdapter;
use App\Modules\Perkuliahan\Persistence\KehadiranPersistence;
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
     * @param int $id_pengambilan_mk
     * @param int $roster
     * @return bool
     */
    public static function insert(string  $keterangan,int $id_pengambilan_mk, int $roster):bool {
        $newKehadiran = new Kehadiran();
        $newKehadiran->setKeterangan(KeteranganKehadiran::getEnumBy($keterangan));
        $newKehadiran->setPengguna(PengambilanMatakuliahBuilder::setId($id_pengambilan_mk)::get());

        $dataCheck = self::kehadiranByInfo("id_roster", $roster);
        if(count($dataCheck) > 0){
            foreach ($dataCheck as $data){
                if($data['id_pengambilan_matakuliah'] ==  $id_pengambilan_mk){
                    echo "ouuuu";
                    return false;
                }
            }
        }
        return self::$pm->insertSingle($newKehadiran,$roster);
    }

    /**
     * @param int $id
     * @param string $keterangan
     * @param int $id_pengambilan_mk
     * @return bool
     */
    public static function update(int $id,string  $keterangan,int $id_pengambilan_mk):bool {
        $updateKehadiran = new Kehadiran();
        $updateKehadiran->setId($id);
        $updateKehadiran->setKeterangan(KeteranganKehadiran::getEnumBy($keterangan));
        $updateKehadiran->setPengguna(PengambilanMatakuliahBuilder::setId($id_pengambilan_mk)::get());
        return self::$pm->updateSingle($updateKehadiran);
    }

    /**
     * @param int $id
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
        return KehadiranAdapter::ArrayEntitiesToDictionaries($found);
    }

    public static function getAll():array {
        $found = self::$pm->getAll();
        if(count($found) <= 0){
            return [];
        }
        return KehadiranAdapter::ArrayEntitiesToDictionaries($found);
    }
}
?>
