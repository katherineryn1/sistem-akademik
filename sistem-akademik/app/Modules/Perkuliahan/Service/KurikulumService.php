<?php
namespace App\Modules\Perkuliahan\Service;

use App\Modules\Perkuliahan\Entity\Kurikulum;
use App\Modules\Perkuliahan\Entity\SemesterKurikulum;
use App\Modules\Perkuliahan\Helper\KurikulumAdapter;
use App\Modules\Perkuliahan\Helper\MatakuliahBuilder;
use App\Modules\Perkuliahan\Persistence\KurikulumPersistence;


class KurikulumService {
    private static KurikulumPersistence $pm;

    function __construct(KurikulumPersistence $pm){
        self::$pm = $pm;
    }

    function __destruct(){
    }

    /**
     * @param int $tahun
     * @param string $semester
     * @param string $kelas
     * @param int $jumlahPertemuan
     * @param string $kodeMatakuliah
     * @return bool
     */
    public static function insert(int  $tahun,string $semester, string $kelas, int $jumlahPertemuan,
                                   string  $kodeMatakuliah):bool {
        $newKurikulum = new Kurikulum();
        $newKurikulum->setTahun($tahun);
        $newKurikulum->setSemester(SemesterKurikulum::getEnumBy($semester));
        $newKurikulum->setKelas($kelas);
        $newKurikulum->setJumlahPertemuan($jumlahPertemuan);
        $newKurikulum->setMatakuliah(MatakuliahBuilder::setKode($kodeMatakuliah)::get());
        $newKurikulum->setKelas($kelas);
        return self::$pm->insertSingle($newKurikulum);
    }

    /**
     * @param int $id
     * @param int $tahun
     * @param string $semester
     * @param string $kelas
     * @param int $jumlahPertemuan
     * @param string $kodeMatakuliah
     * @return bool
     */
    public static function update(int $id,int  $tahun,string $semester, string $kelas, int $jumlahPertemuan,
                                  string  $kodeMatakuliah):bool {

        $newKurikulum = new Kurikulum();
        $newKurikulum->setId($id);
        $newKurikulum->setTahun($tahun);
        $newKurikulum->setSemester(SemesterKurikulum::getEnumBy($semester));
        $newKurikulum->setKelas($kelas);
        $newKurikulum->setJumlahPertemuan($jumlahPertemuan);
        $newKurikulum->setMatakuliah(MatakuliahBuilder::setKode($kodeMatakuliah)::get());
        $newKurikulum->setKelas($kelas);
        return self::$pm->updateSingle($newKurikulum);
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
    public static function kurikulumByInfo(string $attribute,string $value): array{
        $found = self::$pm->getByAttribute([$attribute], [$value], ['=']);
        if(count($found) <= 0){
            return [];
        }
        return KurikulumAdapter::ArrayEntitiesToDictionaries($found);
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return array
     */
    public static function kurikulumByTahunSemester(string $attribute,string $value): array{
        $found = self::$pm->getByAttribute([$attribute], [$value], ['=']);
        if(count($found) <= 0){
            return [];
        }
        return KurikulumAdapter::ArrayEntitiesToDictionaries($found);
    }

    public static function getAll():array {
        $found = self::$pm->getAll();
        if(count($found) <= 0){
            return [];
        }
        return KurikulumAdapter::ArrayEntitiesToDictionaries($found);
    }

    public static  function addDosen(int  $idKurikulum,string  $nomorInduk):bool {
        //return self::$pm->insertUserKurikulum($nomorInduk,$idKurikulum);
        // Todo: Implement
        return  false;
    }

    public static  function removeDosen(int  $id,string $nomorInduk):bool {

        // Todo: Implement
        return  false;
    }


    public static  function getMahasiswa(string  $id):array {
        // Todo: Implement
        return  [];
    }

    public static  function addMahasiswa(int  $id,string  $nomorInduk):array {
        // Todo: Implement
        return  [];
    }

    public static  function removeMahasiswa(int  $id,string $nomorInduk):array {
        // Todo: Implement
        return  [];
    }

    public static  function generateNilai(int  $id):array {
        // Todo: Implement
        return  [];
    }

    public static  function destroyNilai(int  $id):array {
        // Todo: Implement
        return  [];
    }

    public static  function generateRoster(int $id):array {
        // Todo: Implement
        return  [];
    }

    public static  function destroyRoster(int $id):array {
        // Todo: Implement
        return  [];
    }

}
?>
