<?php
namespace App\Modules\Mahasiswa\Service;

use App\Modules\Mahasiswa\Helper\MahasiswaAdapter;
use App\Modules\Pengguna\Helper\PenggunaAdapter;
use App\Modules\Perkuliahan\Service\KehadiranService;
use App\Modules\Perkuliahan\Service\KurikulumService;
use App\Modules\Perkuliahan\Service\NilaiService;
use App\Modules\Perkuliahan\Service\PengambilanMatakuliahService;
use App\Modules\Perkuliahan\Service\RosterService;
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
                                  string $notelepon, string $jabatan,string $fotoProfile,string $jurusan, int $tahunMasuk, int $tahunLulus):bool {
        if(!PenggunaService::insert($nama,$password,  $nomorInduk, $email, $tanggalLahir, $tempatLahir,$jenisKelamin, $alamat,$notelepon, $jabatan,$fotoProfile)){
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
     * @param string $jurusan
     * @param int $tahunMasuk
     * @param int $tahunLulus
     * @return bool
     */
    public static function update(string $nomorInduk,string $jurusan, int $tahunMasuk, int $tahunLulus):bool {
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
        return MahasiswaAdapter::ArrayEntitiesToDictionaries($found);
    }

    public static function getAll():array {
        $found =  self::$pm->getAll();
        if(count($found) <= 0){
            return [];
        }
        $arrMhs = MahasiswaAdapter::ArrayEntitiesToDictionaries($found);
        return  PenggunaAdapter::ArrayInjectPenggunaDictionary($arrMhs);
    }

    public static function getRencanaStudi(string $nomorInduk): array{
        $kurikulum = KurikulumService::getAll();
        $rencanaStudi = [];
        foreach ($kurikulum as $k){
             $mhs = KurikulumService::getMahasiswa($k['id']);
             foreach ($mhs as $m){
                 if($m['nomor_induk'] == $nomorInduk ){
                     $k['pengambilan_matakuliah'] = $m;
                     array_push($rencanaStudi,$k);
                     break;
                 }
             }
        }
        return $rencanaStudi;
    }

    public static function getTranscript(string $nomorInduk){
        $rs = self::getRencanaStudi($nomorInduk);
        $transcript = [];
        $totalSKS = 0;
        $totalPoint = 0;
        foreach ($rs as $kur){
            $transcript[$kur['id']]= [];
            $transcript[$kur['id']]['kurikulum'] = $kur;
            $transcript[$kur['id']]['nilai'] = NilaiService::nilaiByInfo("pengambilan_matakuliah" , $kur['pengambilan_matakuliah']['id']);
        }
        return $transcript;

    }

    public static function getSkripsi(string $nomorInduk){
        // Todo : Implementation
    }

    public static function getJadwalMatakuliah(string $nomorInduk){
        $rs = self::getRencanaStudi($nomorInduk);
        $jadwalMK = [];
        foreach ($rs as $kur){
            $jadwalMK[$kur['id']]= [];
            $jadwalMK[$kur['id']]['kurikulum'] = $kur;
            $jadwalMK[$kur['id']]['roster'] = RosterService::rosterByInfo("id_kurikulum", $kur['id']);
        }
        return $jadwalMK;
    }

    public static function getKehadiran(string $nomorInduk){
        $jMK = self::getJadwalMatakuliah($nomorInduk);
        $kehadiran = [];
        foreach ($jMK as $key => $item){
            $kehadiran[$key]= [];
            $kehadiran[$key]['kurikulum'] = $item['kurikulum'];
            $kehadiran[$key]['roster'] = $item['roster'];
            $kehadiran[$key]['kehadiran'] = [];
            foreach ($item['roster'] as $roster){
                array_push($kehadiran[$key]['kehadiran'], KehadiranService::kehadiranByInfo('id_pengambilan_matakuliah',$roster['id'])[0]);
            }
        }
        return $kehadiran;
    }
}
?>
