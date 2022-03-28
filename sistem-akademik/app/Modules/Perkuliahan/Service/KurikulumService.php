<?php
namespace App\Modules\Perkuliahan\Service;
use App\Modules\Dosen\Service\DosenService;
use App\Modules\Perkuliahan\Entity\Kurikulum;
use App\Modules\Perkuliahan\Persistence\KurikulumPersistence;
use App\Modules\Perkuliahan\Persistence\PengambilanMatakuliahPersistence;

class KurikulumService {
    private static KurikulumPersistence $pmKurikulum;
    private static PengambilanMatakuliahPersistence $pmPengambilanMK;

    function __construct(KurikulumPersistence $pmKurikulum ,PengambilanMatakuliahPersistence $pmPengambilanMK){
        self::$pmPengambilanMK = $pmPengambilanMK;
        self::$pmKurikulum = $pmKurikulum;
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
        $newKurikulum->setDosenByNomorInduk($nomorIndukDosen);
        $newKurikulum->setMatakuliahByKode($kodeMatakuliah);
        $newKurikulum->setKelas($kelas);
        return self::$pmKurikulum->insertSingle($newKurikulum);
    }

    /**
     * @param string $kode
     * @param string $nama
     * @param string $jenis
     * @param string $sifat
     * @param int $sks
     * @return bool
     */
    public static function update(int $id,int  $tahun,string $semester, string $kelas, int $jumlahPertemuan,
                                  string $nomorIndukDosen, string  $kodeMatakuliah):bool {
        $dosen = DosenService::dosenInfo('nomor_induk',$nomorIndukDosen );
        $matakuliah = MatakuliahService::matakuliahByInfo('kode', $kodeMatakuliah);

        $newKurikulum = new Kurikulum();
        $newKurikulum->setId($id);
        $newKurikulum->setTahun($tahun);
        $newKurikulum->setSemester($semester);
        $newKurikulum->setKelas($kelas);
        $newKurikulum->setJumlahPertemuan($jumlahPertemuan);
        $newKurikulum->setDosenByNomorInduk($nomorIndukDosen);
        $newKurikulum->setMatakuliahByKode($kodeMatakuliah);
        $newKurikulum->setKelas($kelas);
        return self::$pmKurikulum->updateSingle($newKurikulum);
    }

    /**
     * @param int $id
     * @return bool
     */
    public static function delete(int $id):bool {
        return  self::$pmKurikulum->deleteSingle($id);
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return array
     */
    public static function kurikulumByInfo(string $attribute,string $value): array{
        $found = self::$pmKurikulum->getByAttribute([$attribute], [$value], ['=']);
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
        $found = self::$pmKurikulum->getAll();
        if(count($found) <= 0){
            return [];
        }
        $dto = array();
        foreach ($found as $data) {
            array_push($dto, $data->getArray());
        }
        return  $dto;
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

    public static  function generateNilai(int  $id):array {
        // Todo: Implement
    }

    public static  function destroyNilai(int  $id):array {
        // Todo: Implement
    }

    public static  function generateRoster(int $id):array {
        // Todo: Implement
    }

    public static  function destroyRoster(int $id):array {
        // Todo: Implement
    }

}
?>
