<?php

namespace App\Http\Controllers;

use App\Modules\Pengumuman\Entity\Pengumuman;
use App\Modules\Pengumuman\Service\PengumumanService;
use Illuminate\Http\Request;

class PengumumanController extends Controller{
    public function testGetAll(){
        $hasil = PengumumanService::getAll();
        foreach ($hasil as $val){
            echo "<pre>";
            print_r($val->getArray());
            echo "</pre>";
        }
    }

    public function insert(){
        $judul= "Pengumuman Peserta NSOP Test";
        $keterangan = "Diberitahukan kelas A dipindahkan ke hari Jumat";
        $tanggal = "10/10/2021";
        if(PengumumanService::insert($judul,$keterangan, $tanggal)){
         echo "Berhasil Insert";
        }else{
            echo "Tidak berhasil insert";
        }
    }

    public function update(){
        $id = 1;
        $judul= "Update Pengumuman Peserta NSOP Test";
        $keterangan = "Diberitahukan kelas B dipindahkan ke hari Jumat";
        $tanggal = "10/10/2021";

        if(PengumumanService::update($id,$judul,$keterangan, $tanggal)){
            echo "Berhasil Update";
        }else{
            echo "Tidak berhasil Update";
        }
    }

    public function delete($id){
        if(PengumumanService::delete($id) == true){
            echo "Success Delete";
        }else{
            echo "Gagal Delete";
        }
    }
}
