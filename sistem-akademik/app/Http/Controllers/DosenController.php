<?php

namespace App\Http\Controllers;

use App\Modules\Dosen\Service\DosenService;
use Illuminate\Http\Request;

class DosenController extends Controller{
    public  function  insertNewDosen(){
        $nama = "Test Dosen";
        $password = "12345678";
        $nomorInduk = "2099002";
        $email = "dosen@test.com";
        $tanggalLahir = "10/16/2003";
        $tempatLahir= "Bali";
        $jenisKelamin ="L";
        $alamat ="Dipatiukur";
        $notelepon ="086537956";
        $jabatan ="Dosen";
        $programstudi = "Informatika";
        $bidangIlmu = 'Teknologi';
        $gelarAkademik = "Master";
        $stausIkatanKerja = "Honorer";
        $statusDosen = true;

        $res = DosenService::insert($nama,$password,  $nomorInduk, $email, $tanggalLahir, $tempatLahir,
            $jenisKelamin, $alamat,$notelepon, $jabatan,$jabatan,$programstudi,$bidangIlmu,
            $gelarAkademik, $stausIkatanKerja,$statusDosen );
        echo $res;
    }
   public function  updateDataDosen(){
        //  Todo: Implement
   }
   public function  getJadwalMengajar(){
       //  Todo: Implement
   }

    public function  getRekapMengajar(){
        //  Todo: Implement
    }

    public function  getKehadiranMengajar(){
        //  Todo: Implement
    }

    public function  addMatakuliah(){
        //  Todo: Implement
    }

    public function  lakukanAbsensi(){
        //  Todo: Implement
    }

    public function bimbunganSkripsi(){
        //  Todo: Implement
    }

    public function validasiSkripsi(){
        //  Todo: Implement
    }
}
