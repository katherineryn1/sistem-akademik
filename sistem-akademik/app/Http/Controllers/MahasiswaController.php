<?php

namespace App\Http\Controllers;

use App\Modules\Mahasiswa\Service\MahasiswaService;
use Illuminate\Http\Request;

class MahasiswaController extends Controller{
    public function dashboard(){
        return view('mahasiswa.dashboard', ['page_title' => 'Dashboard']);
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

    public function  getRencanaStudi(){
        //  Todo: Implement
    }

    public function  getTransripNilai(){
        //  Todo: Implement
    }

    public function  getSkripsi(){
        //  Todo: Implement
    }

    public function  updateSkripsi(){
        //  Todo: Implement
    }

}
