<?php
namespace App\Modules\Mahasiswa\Service;

use DateTime;
use App\Modules\Mahasiswa\Entity\Mahasiswa;
use App\Modules\Mahasiswa\Persistence\MahasiswaPersistence;
use App\Modules\Pengguna\Service\PenggunaService;

class MahasiswaService {
    private static MahasiswaPersistence $pm;

    function __construct(MahasiswaPersistence $pm){
        self::$pm = $pm;
    }

    function __destruct(){
    }

    /**
     * @param string $nama
     * @param string $password
     * @param string $nomorInduk
     * @param string $email
     * @param string $tanggalLahir
     * @param string $tempatLahir
     * @param string $jenisKelamin
     * @param string $alamat
     * @param string $notelepon
     * @param string $jabatan
     * @param string $jurusan
     * @param int $tahunMasuk
     * @param int $tahunLulus
     * @return bool
     * @throws \Exception
     */
    public static function insert(string  $nama,string $password, string $nomorInduk,string $email,
                                  string $tanggalLahir, string $tempatLahir,string $jenisKelamin, string  $alamat,
                                  string $notelepon, string $jabatan,string $jurusan, int $tahunMasuk, int $tahunLulus):bool {
        if(!PenggunaService::insert($nama,$password,  $nomorInduk, $email, $tanggalLahir, $tempatLahir,$jenisKelamin, $alamat,$notelepon, $jabatan)){
            return false;
        }
        $newMahasiswa = new Mahasiswa();
        $newMahasiswa->setNomorInduk($nomorInduk);
        $newMahasiswa->setJurusan($jurusan);
        $newMahasiswa->setTahunMasuk($tahunMasuk);
        $newMahasiswa->setTahunLulus($tahunLulus);

        return  self::$pm->insertSingle($newMahasiswa);
    }

    /**
     * @param string $nomorInduk
     * @param string $jabatan
     * @param string $jurusan
     * @param int $tahunMasuk
     * @param int $tahunLulus
     * @return bool
     */
    public static function update(string $nomorInduk, string $jabatan,string $jurusan, int $tahunMasuk, int $tahunLulus):bool {
        $newMahasiswa = new Mahasiswa();
        $newMahasiswa->setNomorInduk($nomorInduk);
        $newMahasiswa->setJurusan($jurusan);
        $newMahasiswa->setTahunMasuk($tahunMasuk);
        $newMahasiswa->setTahunLulus($tahunLulus);

        return self::$pm->updateSingle($newMahasiswa);
    }

    /**
     * @param string $nomorInduk
     * @return bool
     */
    public static function delete(string $nomorInduk):bool {
        return  self::$pm->deleteSingle($nomorInduk);
    }

    public static function mahasiswaInfo(string $attribute,string $value): array{
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

    public static function getRencanaStudi(string $nomorInduk){
        // Todo : Implementation
    }

    public static function getTranscript(string $nomorInduk){
        // Todo : Implementation
    }

    public static function getSkripsi(string $nomorInduk){
        // Todo : Implementation
    }

    public static function getJadwalMatakuliah(string $nomorInduk){
        // Todo : Implementation
    }
}
?>
