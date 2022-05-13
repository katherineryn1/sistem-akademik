<?php

namespace App\Http\Controllers;

use App\Modules\Mahasiswa\Service\MahasiswaService;
use Illuminate\Http\Request;

class MahasiswaController extends Controller{
    public static function checkFotoProfile($img){
        if($img != ""){
            return  "/storage/" . $img;
        }
        return 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';
    }

    public function dashboard(Request $request){
        $currUser = $request->session()->get('currentuser', null);
        return view('mahasiswa.dashboard', ['page_title' => 'Dashboard',
                                                'url_profile' => '/daak/profile',
                                            'img_user' => self::checkFotoProfile($currUser['foto_profile']),
                                            'currentuser' => $currUser['nama']]);
    }

    public function insert(Request $request){
        $input = $request->validate([
            'inputNama' => ['required'],
            'inputPassword' => ['required'],
            'inputNomorInduk' => ['required', 'unique:users_data,nomor_induk'],
            'inputEmail' => ['required' , 'unique:users_data,email'],
            'inputTanggalLahir' => ['required'],
            'inputTempatLahir' => ['required'],
            'inputJenisKelamin' => ['required'],
            'inputAlamat' => ['required'],
            'inputNoTelp' => ['required'],
            'inputJurusan' => ['required'],
            'inputTahunMasuk' => ['required'],
            'inputTahunLulus' => ['required'],
        ]);

        if (!$request->hasFile('inputFotoProfile')) {
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Mahasiswa - Foto tidak diterima"] ]);
            return back();
        }

        $file = $request->file('inputFotoProfile');
        $photoProfileDir = $file->store('profile', 'public');
        if($photoProfileDir == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Mahasiswa - Foto gagal disimpan"] ]);
            return back();
        }

        $hasil = MahasiswaService::insert(
            $input['inputNama'],
            $input['inputPassword'],
            $input['inputNomorInduk'],
            $input['inputEmail'],
            $input['inputTanggalLahir'],
            $input['inputTempatLahir'],
            $input['inputJenisKelamin'],
            $input['inputAlamat'],
            $input['inputNoTelp'],
            "Mahasiswa",
            $photoProfileDir,
            $input['inputJurusan'],
            $input['inputTahunMasuk'],
            $input['inputTahunLulus'],
        );

        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Mahasiswa"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menambah Mahasiswa"] ]);
        }
        //return back();
    }

    public function delete(Request $request){
        $input = $request->validate([
            'nomor_induk' => ['required'],
        ]);
        if(MahasiswaService::delete($input['nomor_induk']) == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Hapus Mahasiswa"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Hapus Mahasiswa"] ]);
        }
        return back();
    }

    public function  getJadwalMatakuliah(){
        //  Todo: Implement
    }

    public function  rencanaStudi(Request $request){
        $currUser = $request->session()->get('currentuser', null);
        $rsMhs = MahasiswaService::getRencanaStudi($currUser['nomor_induk']);
        return view('mahasiswa.rencana-studi', ['page_title' => 'Rencana Studi',
            'url_profile' => '/mahasiswa/profile',
            'img_user' => self::checkFotoProfile($currUser['foto_profile']),
            'currentuser' => $currUser['nama'] ,
            'rencana_studi' => $rsMhs]);
    }

    public function  transkripNilai(Request $request){
        $currUser = $request->session()->get('currentuser', null);
        $transcriptNilai = MahasiswaService::getTranscript($currUser['nomor_induk']);
        return view('mahasiswa.transkrip-nilai', ['page_title' => 'Transcript Nilai',
            'url_profile' => '/mahasiswa/profile',
            'img_user' => self::checkFotoProfile($currUser['foto_profile']),
            'currentuser' => $currUser['nama'] ,
            'transript_nilai' => $transcriptNilai]);
    }

    public function  getSkripsi(){
        //  Todo: Implement
    }

    public function  updateSkripsi(){
        //  Todo: Implement
    }

}
