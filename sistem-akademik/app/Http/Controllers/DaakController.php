<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DaakController extends Controller{
    public function dashboard(){
//        session();
          return view('daak.dashboard', ['page_title' => 'Dashboard']);
    }

    public function jadwalKuliah(){
        return view('daak.jadwal-kuliah', ['page_title' => 'Dashboard']);
    }

    public function matakuliahKurikulum(){
        return view('daak.mahasiswa', ['page_title' => 'Matakuliah Kurikulum']);
    }

    public function pengumuman(){
        return view('daak.pengumuman', ['page_title' => 'Pengumuman']);
    }

    public function akunMahasiswa(){
        return view('daak.mahasiswa', ['page_title' => 'Daak Mahasiswa']);
    }

    public function akunDosen(){
        $data = array(
            array( "id" => 1,
                "nama" => "Brandon Jacob",
                "type" => "Designer",
                  "age" =>   28,
                "dummy" => "Designer"),
            array( "id" => 2,
                "nama" => "Brandon Jacob",
                "type" => "Designer",
                "age" =>   28,
                "dummy" => "Designer"),
            array( "id" => 3,
                "nama" => "Brandon Jacob",
                "type" => "Designer",
                "age" =>   28,
                "dummy" => "Designer")
        );
        return view('daak.dosen', ['page_title' => 'Daak Dosen','data' => $data]);
    }

    public function akunPengguna(){
        return view('daak.pengguna', ['page_title' => 'Daak Pengguna']);
    }

}
