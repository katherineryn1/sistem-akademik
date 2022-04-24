<?php

namespace App\Http\Controllers;


use App\Modules\Perkuliahan\Service\MatakuliahService;
use Illuminate\Http\Request;

class MatakuliahController extends Controller{
    public function insert(Request $request){
        $input = $request->validate([
            'inputKode' => ['required'],
            'inputNama' => ['required'],
            'inputJenis' => ['required'],
            'inputSifat' => ['required'],
            'inputSKS' => ['required'],
        ]);

        $hasil = MatakuliahService::insert(
            $input['inputKode'],
            $input['inputNama'],
            $input['inputJenis'],
            $input['inputSifat'],
            $input['inputSKS']);
        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Matakuliah"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menambah Matakuliah"] ]);
        }
        return back();
    }

    public function delete(Request $request){
        $input = $request->validate([
            'kode' => ['required'],
        ]);

        $hasil = MatakuliahService::delete($input['kode']);
        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menghapus Matakuliah"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menghapus Matakuliah"] ]);
        }
        return back();
    }
    public function  getMatakuliah(){
        //  Todo: Implement
    }

    public function  getMahasiswa(){
        //  Todo: Implement
    }

    public function  getKehadiran(){
        //  Todo: Implement
    }

    public function  getNilai(){
        //  Todo: Implement
    }

    public function  setNilai(){
        //  Todo: Implement
    }

    public function  setKehadiran(){
        //  Todo: Implement
    }

    public function  addMahasiswa(){
        //  Todo: Implement
    }

    public function  setJadwal(){
        //  Todo: Implement
    }

    public function  getJadwal(){
        //  Todo: Implement
    }


}
