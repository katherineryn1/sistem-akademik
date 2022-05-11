<?php

namespace App\Http\Controllers;
use App\Modules\Dosen\Service\DosenService;
use App\Modules\Mahasiswa\Service\MahasiswaService;
use App\Modules\Pengguna\Service\PenggunaService;
use App\Modules\Pengumuman\Service\PengumumanService;
use App\Modules\Perkuliahan\Service\KurikulumService;
use App\Modules\Perkuliahan\Service\MatakuliahService;
use App\Modules\Perkuliahan\Service\RosterService;
use Illuminate\Http\Request;

class DaakController extends Controller{
    public function dashboard(){
          return view('daak.dashboard', ['page_title' => 'Dashboard']);
    }

    public function jadwalKuliah(){
        $dataKurikulum = KurikulumService::getAll();

        $tempData = array();
        foreach ($dataKurikulum as $kur){
            $resJadwal = RosterService::rosterByInfo("id_kurikulum",$kur['id']);
            if(count($resJadwal) == 0){
                continue;
            }
            $tempData[$kur['id']] = array();
            $tempData[$kur['id']]['kurikulum'] = $kur;
            $tempData[$kur['id']]['jadwal'] = $resJadwal;
        }
        return view('daak.jadwal-kuliah', ['page_title' => 'Dashboard' , 'data' => $tempData]);
    }

    public function matakuliahKurikulum(){
        $dataKurikulum = KurikulumService::getAll();
        $dataMatakuliah = MatakuliahService::getAll();
        return view('daak.matakuliah-kurikulum', ['page_title' => 'Matakuliah Kurikulum', 'data_matakuliah' => $dataMatakuliah, 'data_kurikulum' => $dataKurikulum]);
    }

    public function pengambilanMatakuliah(){
        $data = [];
        return view('daak.pengambilan-matakuliah', ['page_title' => 'Pengambilan Matakuliah' , 'data' => $data]);
    }

    public function pengumuman(){
        $data = PengumumanService::getAll();
        return view('daak.pengumuman', ['page_title' => 'Pengumuman' , 'data' => $data]);
    }

    public function akunMahasiswa(){
        $data = MahasiswaService::getAll();
        return view('daak.mahasiswa', ['page_title' => 'Daak Mahasiswa','data' => $data]);
    }

    public function akunDosen(Request $request){
        $data = DosenService::getAll();
        return view('daak.dosen', ['page_title' => 'Daak Dosen','data' => $data]);
    }

    public function akunPengguna(){
        $data = PenggunaService::getAll();
        return view('daak.pengguna', ['page_title' => 'Daak Pengguna','data' => $data]);
    }

}
