<?php

namespace App\Http\Controllers;
use App\Modules\Pengguna\Service\PenggunaService;
use Illuminate\Http\Request;

class DaakController extends Controller{
    public function dashboard(){
          return view('daak.dashboard', ['page_title' => 'Dashboard']);
    }

    public function jadwalKuliah(){
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
        return view('daak.jadwal-kuliah', ['page_title' => 'Dashboard' , 'data' => $data]);
    }

    public function matakuliahKurikulum(){
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
        return view('daak.matakuliah-kurikulum', ['page_title' => 'Matakuliah Kurikulum', 'data_matakuliah' => $data, 'data_kurikulum' => $data]);
    }

    public function pengumuman(){
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
        return view('daak.pengumuman', ['page_title' => 'Pengumuman' , 'data' => $data]);
    }

    public function akunMahasiswa(){
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
        return view('daak.mahasiswa', ['page_title' => 'Daak Mahasiswa','data' => $data]);
    }

    public function akunDosen(Request $request){
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
        $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Hallo error dari controller"] ]);
        return view('daak.dosen', ['page_title' => 'Daak Dosen','data' => $data]);
    }

    public function akunPengguna(){
        $data = PenggunaService::getAll();
        return view('daak.pengguna', ['page_title' => 'Daak Pengguna','data' => $data]);
    }

}
