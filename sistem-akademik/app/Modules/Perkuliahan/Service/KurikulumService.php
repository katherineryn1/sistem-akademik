<?php
namespace App\Modules\Perkuliahan\Service;

use App\Modules\Perkuliahan\Entity\Kurikulum;
use App\Modules\Perkuliahan\Entity\PosisiAmbilPengambilanMatakuliah;
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

    /**
     * @param int $id
     * @param string $nomorInduk
     * @return bool
     */
    public static  function addDosen(int  $id,string  $nomorInduk):bool {
        $kurikulum = self::kurikulumByInfo("id",$id);
        if(count($kurikulum) == 0 ){
            return false;
        }
        if(!PengambilanMatakuliahService::insert($nomorInduk,"Pengajar", $id)){
            return  false;
        }
        $pengambilanKurikulum = PengambilanMatakuliahService::pengambilanMatakuliahByInfo('id_kurikulum' , $id);
        if(count($pengambilanKurikulum) == 0 ){
            return false;
        }
        $currentPengambilan = [];
        foreach ($pengambilanKurikulum as $data){
            if($data['nomor_induk'] == $nomorInduk && $data['posisi_ambil']->get() == PosisiAmbilPengambilanMatakuliah::MURID ){
                $currentPengambilan = $data;
                break;
            }
        }
        return  true;
    }

    /**
     * @param int $id
     * @param string $nomorInduk
     * @return bool
     */
    public static  function removeDosen(int  $id,string $nomorInduk):bool {
        $allDosen = self::getDosen($id);
        foreach ($allDosen as $dosen){
            if($dosen['nomor_induk'] == $nomorInduk){
                return PengambilanMatakuliahService::delete($dosen['id']);
            }
        }
        return  false;
    }

    /**
     * @param string $id
     * @return array
     */
    public static  function getMahasiswa(string  $id):array {
        $kurikulum = self::kurikulumByInfo("id",$id);
        if(count($kurikulum) == 0 ){
            return [];
        }
        $pengambilan = PengambilanMatakuliahService::pengambilanMatakuliahByInfo("id_kurikulum",$id);
        $listMhs = [];
        foreach ($pengambilan as $data){
            if($data['posisi_ambil']->get() == PosisiAmbilPengambilanMatakuliah::MURID){
                array_push($listMhs,$data);
            }
        }
        return $listMhs;
    }

    /**
     * @param string $id
     * @return array
     */
    public static  function getDosen(string  $id):array {
        $kurikulum = self::kurikulumByInfo("id",$id);
        if(count($kurikulum) == 0 ){
            return false;
        }
        $pengambilan = PengambilanMatakuliahService::pengambilanMatakuliahByInfo("id_kurikulum",$id);
        $listDosen = [];
        foreach ($pengambilan as $data){
            if($data['posisi_ambil']->get() == PosisiAmbilPengambilanMatakuliah::PENGAJAR){
                array_push($listDosen,$data);
            }
        }
        return $listDosen;
    }

    /**
     * @param int $id
     * @param string $nomorInduk
     * @return bool
     */
    public static  function addMahasiswa(int  $id,string  $nomorInduk):bool {
        $kurikulum = self::kurikulumByInfo("id",$id);
        if(count($kurikulum) == 0 ){
            return false;
        }
        if(!PengambilanMatakuliahService::insert($nomorInduk,"Murid", $id)){
            return  false;
        }
        $pengambilanKurikulum = PengambilanMatakuliahService::pengambilanMatakuliahByInfo('id_kurikulum' , $id);
        if(count($pengambilanKurikulum) == 0 ){
            return false;
        }
        $currentPengambilan = [];
        foreach ($pengambilanKurikulum as $data){
            if($data['nomor_induk'] == $nomorInduk && $data['posisi_ambil']->get() == PosisiAmbilPengambilanMatakuliah::MURID ){
                $currentPengambilan = $data;
                break;
            }
        }
        if(count($currentPengambilan) == 0){
            return false;
        }
        if(!NilaiService::insert($id, 0,0,0,0,0,0, 0,"",   $currentPengambilan['id'] )){
            return false;
        }
        return  true;
    }

    /**
     * @param int $id
     * @param string $nomorInduk
     * @return bool
     */
    public static  function removeMahasiswa(int  $id,string $nomorInduk):bool {
        $allMhs = self::getMahasiswa($id);
        foreach ($allMhs as $mhs){
            if($mhs['nomor_induk'] == $nomorInduk){
                return PengambilanMatakuliahService::delete($mhs['id']);
            }
        }
        return  false;
    }

    public static  function generateRoster(int $idKurikulum, int $idSampleRoster):bool {
        $kurikulum = self::kurikulumByInfo("id",$idKurikulum);
        if(count($kurikulum) == 0 ){
            return false;
        }
        print_r($kurikulum[0]['jumlah_pertemuan']);
        $sampleRoster = RosterService::rosterByInfo("id", $idSampleRoster);
        print_r($sampleRoster[0]);
        return  false;
    }

    public static  function destroyRoster(int $id):array {
        // Todo: Implement
        return  [];
    }

}
?>
