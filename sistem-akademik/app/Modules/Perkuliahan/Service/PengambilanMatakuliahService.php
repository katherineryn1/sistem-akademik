<?php


namespace App\Modules\Perkuliahan\Service;




use App\Modules\Pengguna\Helper\PenggunaBuilder;
use App\Modules\Perkuliahan\Entity\PengambilanMatakuliah;
use App\Modules\Perkuliahan\Entity\PosisiAmbilPengambilanMatakuliah;
use App\Modules\Perkuliahan\Helper\PengambilanMatakuliahAdapter;
use App\Modules\Perkuliahan\Persistence\PengambilanMatakuliahPersistence;

class PengambilanMatakuliahService{
    private static PengambilanMatakuliahPersistence $pm;

    function __construct(PengambilanMatakuliahPersistence $pm){
        self::$pm  = $pm;
    }

    function __destruct(){
    }

    /**
     * @param string $nomorInduk
     * @param string $posisiAmbil
     * @param int $kurikulum
     * @return bool
     */
    public static function insert(string  $nomorInduk,string $posisiAmbil,int $kurikulum):bool {
        $newPengambilan = new PengambilanMatakuliah();
        $newPengambilan->setPengguna(PenggunaBuilder::setNomorInduk($nomorInduk)::get());
        $newPengambilan->setPosisiAmbil(PosisiAmbilPengambilanMatakuliah::getEnumBy($posisiAmbil));
        return self::$pm->insertSingle($newPengambilan,$kurikulum);
    }

    /**
     * @param string $id
     * @return bool
     */
    public static function delete(string $id):bool {
        return  self::$pm->deleteSingle($id);
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return array
     */
    public static function pengambilanMatakuliahByInfo(string $attribute,string $value): array{
        $found = self::$pm->getByAttribute([$attribute], [$value], ['=']);
        if(count($found) <= 0){
            return [];
        }
        return PengambilanMatakuliahAdapter::ArrayEntitiesToDictionaries($found);
    }

    public static function getAll():array {
        $found = self::$pm->getAll();
        if(count($found) <= 0){
            return [];
        }
        return PengambilanMatakuliahAdapter::ArrayEntitiesToDictionaries($found);
    }

}
