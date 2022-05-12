<?php
namespace App\Modules\Dosen\Service;

use App\Modules\Dosen\Entity\StatusDosen;
use App\Modules\Dosen\Entity\StatusIkatanKerja;
use App\Modules\Dosen\Helper\DosenAdapter;
use App\Modules\Pengguna\Helper\PenggunaAdapter;
use App\Modules\Perkuliahan\Service\KehadiranService;
use App\Modules\Perkuliahan\Service\KurikulumService;
use App\Modules\Perkuliahan\Service\RosterService;
use DateTime;
use App\Modules\Dosen\Entity\Dosen;
use App\Modules\Dosen\Persistence\DosenPersistence;
use App\Modules\Pengguna\Service\PenggunaService;

class DosenService {
    private static DosenPersistence $pm;

    function __construct(DosenPersistence $pm){
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
     * @param string $fotoProfile
     * @param string $programStudi
     * @param string $bidangIlmu
     * @param string $gelarAkademik
     * @param string $statusIkatanKerja
     * @param bool $statusDosen
     * @return bool
     * @throws \Exception
     */
    public static function insert(string  $nama,string $password, string $nomorInduk,string $email,
                                  string $tanggalLahir, string $tempatLahir,string $jenisKelamin, string  $alamat,
                                  string $notelepon, string $jabatan, string $fotoProfile,string $programStudi,string $bidangIlmu,
                                  string $gelarAkademik,string $statusIkatanKerja,bool $statusDosen):bool {
        if(!PenggunaService::insert($nama,$password,  $nomorInduk, $email, $tanggalLahir, $tempatLahir,$jenisKelamin, $alamat,$notelepon, $jabatan,$fotoProfile)){
            return false;
        }
        $newDosen = new Dosen();
        $newDosen->setNomorInduk($nomorInduk);
        $newDosen->setProgramStudi($programStudi);
        $newDosen->setBidangIlmu($bidangIlmu);
        $newDosen->setGelarAkademik($gelarAkademik);
        $newDosen->setStatusIkatanKerja(StatusIkatanKerja::getEnumBy($statusIkatanKerja));
        $newDosen->setStatusDosen(StatusDosen::getEnumBy($statusDosen));
        return  self::$pm->insertSingle($newDosen);

    }

    /**
     * @param string $nomorInduk
     * @param string $programStudi
     * @param string $bidangIlmu
     * @param string $gelarAkademik
     * @param string $statusIkatanKerja
     * @param bool $statusDosen
     * @return bool
     */
    public static function update(string $nomorInduk,string $programStudi,string $bidangIlmu,
                                  string $gelarAkademik,string $statusIkatanKerja,bool $statusDosen):bool {
        $newDosen = new Dosen();
        $newDosen->setNomorInduk($nomorInduk);
        $newDosen->setProgramStudi($programStudi);
        $newDosen->setBidangIlmu($bidangIlmu);
        $newDosen->setGelarAkademik($gelarAkademik);
        $newDosen->setStatusIkatanKerja(StatusIkatanKerja::getEnumBy($statusIkatanKerja));
        $newDosen->setStatusDosen(StatusDosen::getEnumBy($statusDosen));

        return self::$pm->updateSingle($newDosen);
    }

    /**
     * @param string $nomorInduk
     * @return bool
     */
    public static function delete(string $nomorInduk):bool {
        return  self::$pm->deleteSingle($nomorInduk);
    }

    public static function dosenInfo(string $attribute,string $value): array{
        $found = self::$pm->getByAttribute([$attribute], [$value], ['=']);
        if(count($found) <= 0){
            return [];
        }
        return DosenAdapter::ArrayEntitiesToDictionaries($found);
    }

    public static function getAll():array {
        $found =  self::$pm->getAll();
        if(count($found) <= 0){
            return [];
        }
        $arrDosen = DosenAdapter::ArrayEntitiesToDictionaries($found);
        return PenggunaAdapter::ArrayInjectPenggunaDictionary($arrDosen);
    }

    public static function getRekapMengajar(string $nomorInduk){
        $kurikulum = KurikulumService::getAll();
        $rencanaStudi = [];
        foreach ($kurikulum as $k){
            $dosen = KurikulumService::getDosen($k['id']);
            foreach ($dosen as $d){
                if($d['nomor_induk'] == $nomorInduk ){
                    $k['pengambilan_matakuliah'] = $d;
                    array_push($rencanaStudi,$k);
                    break;
                }
            }
        }
        return $rencanaStudi;
    }


    public static function getBimbinganSkripsi(string $nomorInduk){
        // Todo : Implementation
    }

    public static function getJadwalMengajar(string $nomorInduk){
        $rs = self::getRekapMengajar($nomorInduk);
        $jadwalMK = [];
        foreach ($rs as $kur){
            $jadwalMK[$kur['id']]= [];
            $jadwalMK[$kur['id']]['kurikulum'] = $kur;
            $jadwalMK[$kur['id']]['roster'] = RosterService::rosterByInfo("id_kurikulum", $kur['id']);
        }
        return $jadwalMK;
    }

    public static function getKehadiranMmengajar(string $nomorInduk){
        $jMK = self::getJadwalMengajar($nomorInduk);
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

    public static function lakukanAbsensi(string $nomorInduk): bool {
        $jMK = self::getJadwalMengajar($nomorInduk);
        $currentTime = new DateTime();

        foreach ($jMK as $key => $item){
            foreach ($item['roster'] as $r){
                $targetTime =  $r['tanggal']->format('Y/m/d') . " " . $r['jam_mulai']  . ":" . "00";
                $targetDT = new DateTime($targetTime);
                $diffDT = $currentTime->diff($targetDT);
                $minutes = $diffDT->days * 24 * 60;
                $minutes += $diffDT->h * 60;
                $minutes += $diffDT->i;
                echo "\n Different: " ,  $minutes , "\n";
                if($minutes <= 10){
                   if($targetDT < $currentTime){
                       echo "Anda Telat\n";
                   }else{
                       echo "Anda tidak telat\n";
                   }
                   $res = RosterService::generateKehadiran($item['kurikulum']['id'], $r['id']);

                   if($res){
                        echo "Success Generate Kehadiran\n";
                        return true;
                   }else{
                        echo "Failed Generate Kehadiran\n";
                   }
                }else{
                    echo "Belum ada Jadwal\n";
                }
            }
            return false;
        }
    }

}
?>
