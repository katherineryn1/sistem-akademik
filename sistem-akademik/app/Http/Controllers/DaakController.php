<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaakController extends Controller{
    public function dashboard(){
        return view('daak.dashboard', ['name' => 'James']);
    }

    public function jadwalKuliah(){
        return view('daak.dashboard', ['name' => 'James']);
    }

    public function matakuliahKurikulum(){
        return view('daak.dashboard', ['name' => 'James']);
    }

    public function pengumuman(){
        return view('daak.dashboard', ['name' => 'James']);
    }

    public function akunMahasiswa(){
        return view('daak.dashboard', ['name' => 'James']);
    }

    public function akunDosen(){
        return view('daak.dashboard', ['name' => 'James']);
    }

    public function akunPengguna(){
        return view('daak.dashboard', ['name' => 'James']);
    }

}
