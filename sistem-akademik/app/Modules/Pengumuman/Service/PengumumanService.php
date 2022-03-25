<?php
namespace App\Modules\Pengumuman\Service;
use DateTime;
use App\Modules\Pengumuman\Entity\Pengumuman;
use App\Modules\Pengumuman\Persistence\PengumumanPersistence;

class PengumumanService {
    private static PengumumanPersistence $pm;

    function __construct(PengumumanPersistence $pm){
        self::$pm = $pm;
    }

    function __destruct(){
    }

    /**
     * @param string $judul
     * @param string $keterangan
     * @param string $tanggal
     * @return bool
     */
    public static function insert(string  $judul,string $keterangan, string $tanggal):bool {
        $newPengumuman = new Pengumuman();
        $newPengumuman->setJudul($judul) ;
        $newPengumuman->setKeterangan($keterangan);
        $newPengumuman->setTanggal(new DateTime($tanggal));

        return self::$pm->insertSingle($newPengumuman);
    }

    /**
     * @param string $judul
     * @param string $keterangan
     * @param string $tanggal
     * @return bool
     */
    public static function update(int $id,string  $judul,string $keterangan, string $tanggal):bool {
        $newPengumuman = new Pengumuman();
        $newPengumuman->setId($id) ;
        $newPengumuman->setJudul($judul) ;
        $newPengumuman->setKeterangan($keterangan);
        $newPengumuman->setTanggal(new DateTime($tanggal));

        return self::$pm->updateSingle($newPengumuman);
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
    public static function getPengumumanByInfo(string $attribute,string $value): array{
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
