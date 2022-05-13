<?php

namespace App\Http\Controllers;
use App\Modules\Dosen\Service\DosenService;
use App\Modules\Mahasiswa\Service\MahasiswaService;
use App\Modules\Pengguna\Service\PenggunaService;
use App\Modules\Pengumuman\Service\PengumumanService;
use App\Modules\Perkuliahan\Entity\JenisMatakuliah;
use App\Modules\Perkuliahan\Entity\PosisiAmbilPengambilanMatakuliah;
use App\Modules\Perkuliahan\Entity\SemesterKurikulum;
use App\Modules\Perkuliahan\Entity\SifatMatakuliah;
use App\Modules\Perkuliahan\Service\KurikulumService;
use App\Modules\Perkuliahan\Service\MatakuliahService;
use App\Modules\Perkuliahan\Service\PengambilanMatakuliahService;
use App\Modules\Perkuliahan\Service\RosterService;
use Illuminate\Http\Request;

class DaakController extends Controller{
    public static function checkFotoProfile($img){
        if($img != ""){
           return  "/storage/" . $img;
        }
        return 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';
    }
    public function dashboard(Request $request){
        $currUser = $request->session()->get('currentuser', null);

        return view('daak.dashboard', ['page_title' => 'Dashboard' ,
                                            'url_profile' => '/daak/profile',
                                            'img_user' => self::checkFotoProfile($currUser['foto_profile']),
                                            'currentuser' => $currUser['nama']
                                            ]);
    }

    public function jadwalKuliah(Request $request){
        $currUser = $request->session()->get('currentuser', null);
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
        return view('daak.jadwal-kuliah', ['page_title' => 'Dashboard' ,
                                                'url_profile' => '/daak/profile',
                                                'img_user' => self::checkFotoProfile($currUser['foto_profile']),
                                                'currentuser' => $currUser['nama'],
                                                'data' => $tempData ,
                                                'dl_kurikulum' =>$dataKurikulum]);
    }

    public function matakuliahKurikulum(Request $request){
        $currUser = $request->session()->get('currentuser', null);
        $dataKurikulum = KurikulumService::getAll();
        $dataMatakuliah = MatakuliahService::getAll();
        $jenisDatalist = JenisMatakuliah::getEnumString();
        $sifatDatalist = SifatMatakuliah::getEnumString();
        $semesterDatalist =SemesterKurikulum::getEnumString();
        return view('daak.matakuliah-kurikulum', ['page_title' => 'Matakuliah Kurikulum',
                                                        'url_profile' => '/daak/profile',
                                                        'img_user' => self::checkFotoProfile($currUser['foto_profile']),
                                                        'currentuser' => $currUser['nama'],
                                                        'data_matakuliah' => $dataMatakuliah,
                                                        'data_kurikulum' => $dataKurikulum,
                                              'jenis_mk' => $jenisDatalist,
                                            'sifat_mk' => $sifatDatalist,
                                            'semester_kr' => $semesterDatalist
        ]);
    }

    public function pengambilanMatakuliah(Request $request){
        $currUser = $request->session()->get('currentuser', null);
        $data = array();
        $allPengguna = PenggunaService::getAll();
        $allKurikulum = KurikulumService::getAll();
        foreach ($allKurikulum as $kur){
            $resPengambilan = PengambilanMatakuliahService::pengambilanMatakuliahByInfo("id_kurikulum" ,$kur['id'] );
            if(count($resPengambilan) == 0){
                continue;
            }
            $data[$kur['id']] = array();
            $data[$kur['id']]['pengambilan_mk'] = $resPengambilan;
            $data[$kur['id']]['kurikulum'] = $kur;
        }
        return view('daak.pengambilan-matakuliah', ['page_title' => 'Pengambilan Matakuliah' ,
                                                            'url_profile' => '/daak/profile',
                                                            'img_user' => self::checkFotoProfile($currUser['foto_profile']),
                                                            'currentuser' => $currUser['nama'],
                                                            'data' => $data,
                                                            'enum_pengambilan_mk' =>PosisiAmbilPengambilanMatakuliah::getEnumString() , 'dl_pengguna' => $allPengguna, 'dl_kurikulum' => $allKurikulum]);
    }

    public function pengumuman(Request $request){
        $currUser = $request->session()->get('currentuser', null);
        $data = PengumumanService::getAll();
        return view('daak.pengumuman', ['page_title' => 'Pengumuman',
                                            'url_profile' => '/daak/profile',
                                            'img_user' => self::checkFotoProfile($currUser['foto_profile']),
                                            'currentuser' => $currUser['nama'],
                                            'data' => $data]);
    }

    public function akunMahasiswa(Request $request){
        $currUser = $request->session()->get('currentuser', null);
        $data = MahasiswaService::getAll();
        return view('daak.mahasiswa', ['page_title' => 'Daak Mahasiswa',
                                            'url_profile' => '/daak/profile',
                                            'img_user' => self::checkFotoProfile($currUser['foto_profile']),
                                            'currentuser' => $currUser['nama'],
                                            'data' => $data]);
    }

    public function akunDosen(Request $request){
        $currUser = $request->session()->get('currentuser', null);
        $data = DosenService::getAll();
        return view('daak.dosen', ['page_title' => 'Daak Dosen',
                                        'url_profile' => '/daak/profile',
                                        'img_user' => self::checkFotoProfile($currUser['foto_profile']),
                                        'currentuser' => $currUser['nama']
                                            ,'data' => $data]);
    }

    public function akunPengguna(Request $request){
        $currUser = $request->session()->get('currentuser', null);
        $data = PenggunaService::getAll();
        return view('daak.pengguna', ['page_title' => 'Daak Pengguna',
                                            'url_profile' => '/daak/profile',
                                            'img_user' => self::checkFotoProfile($currUser['foto_profile']),
                                            'currentuser' => $currUser['nama'],
                                            'data' => $data]);
    }

}
