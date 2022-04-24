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

    public function insert(Request $request){
        $input = $request->validate([
            'inputJudul' => ['required'],
            'inputKeterangan' => ['required'],
            'inputTanggal' => ['required'],
        ]);

        $hasil = PengumumanService::insert( $input['inputJudul'],
                                            $input['inputKeterangan'],
                                            $input['inputTanggal']);
        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Pengumuman"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menambah Pengumuman"] ]);
        }
        return back();
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

    public function delete(Request $request){
        $input = $request->validate([
            'id' => ['required'],
        ]);

        $hasil = PengumumanService::delete($input['id']);
        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menghapus Pengumuman"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menghapus Pengumuman"] ]);
        }
        return back();
    }
}
