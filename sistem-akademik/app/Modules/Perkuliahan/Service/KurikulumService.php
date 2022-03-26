<?php
namespace App\Modules\Perkuliahan\Service;
use App\Modules\Dosen\Service\DosenService;
use DateTime;
use App\Modules\Perkuliahan\Entity\Kurikulum;
use App\Modules\Perkuliahan\Persistence\MatakuliahPersistence;

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
     * @param string $nomorInduk
     * @param string $kodeMatakuliah
     * @return bool
     */
    public static function insert(int  $tahun,string $semester, string $kelas, int $jumlahPertemuan,
                                  string $nomorIndukDosen, string  $kodeMatakuliah):bool {
        $dosen = DosenService::dosenInfo('nomor_induk',$nomorIndukDosen );
        $matakuliah = MatakuliahService::matakuliahByInfo('kode', $kodeMatakuliah);

        $newKurikulum = new Kurikulum();
        $newKurikulum->setTahun($tahun);
        $newKurikulum->setSemester($semester);
        $newKurikulum->setKelas($kelas);
        $newKurikulum->setJumlahPertemuan($jumlahPertemuan);
        $newKurikulum->setDosen($dosen[0]);
        $newKurikulum->setMatakuliah($matakuliah[0]);
        $newKurikulum->setKelas($kelas);
        return self::$pm->insertSingle($newKurikulum);
    }

    /**
     * @param string $kode
     * @param string $nama
     * @param string $jenis
     * @param string $sifat
     * @param int $sks
     * @return bool
     */
    public static function update(string  $kode,string $nama, string $jenis, string $sifat, int $sks):bool {
        $newMatakuliah = new Matakuliah();
        $newMatakuliah->setKode($kode);
        $newMatakuliah->setNama($nama);
        $newMatakuliah->setJenis($jenis);
        $newMatakuliah->setSifat($sifat);
        $newMatakuliah->setSks($sks);
        return self::$pm->updateSingle($newMatakuliah);
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
    public static function matakuliahByInfo(string $attribute,string $value): array{
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

    public static  function addDosen(int  $id,string  $nomorInduk):array {
        // Todo: Implement
    }

    public static  function removeDosen(int  $id,string $nomorInduk):array {
        // Todo: Implement
    }

    public static  function getMahasiswa(string  $id):array {
        // Todo: Implement
    }

    public static  function addMahasiswa(int  $id,string  $nomorInduk):array {
        // Todo: Implement
    }

    public static  function removeMahasiswa(int  $id,string $nomorInduk):array {
        // Todo: Implement
    }

    public static  function getNilai(int  $id):array {
        // Todo: Implement
    }

    public static  function getRoster(int $id):array {
        // Todo: Implement
    }

}
?>
