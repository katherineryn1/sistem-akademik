<?php


namespace App\Http\Controllers;


use App\Modules\Perkuliahan\Service\KurikulumService;
use Illuminate\Http\Request;
use App\Modules\Perkuliahan\Service\PengambilanMatakuliahService;

class PengambilanMatakuliahController extends Controller{
    public function insert(Request $request){
        $input = $request->validate([
            'inputNomorIndukPengguna' => ['required'],
            'inputPosisiAmbil' => ['required'],
            'inputKurikulum' => ['required'],
        ]);

        $hasil = false;
        $idKurikulum = trim(explode("-", $input['inputKurikulum'])[0]);
        $nomorInduk = trim(explode("-", $input['inputNomorIndukPengguna'])[0]);
        if( $input['inputPosisiAmbil'] == "Murid"){
            $hasil = KurikulumService::addMahasiswa($idKurikulum ,$nomorInduk);
        }else if ( $input['inputPosisiAmbil'] == "Pengajar"){
            $hasil = KurikulumService::addDosen($idKurikulum ,$nomorInduk );
        }
        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Pengambilan Matakuliah"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menambah Pengambilan Matakuliah"] ]);
        }
        return back();
    }

    public function delete(Request $request){
        $input = $request->validate([
            'id' => ['required'],
        ]);

        $hasil = PengambilanMatakuliahService::delete($input['id']);
        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menghapus Pengambilan Matakuliah"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menghapus Pengambilan Matakuliah"] ]);
        }
        return back();
    }

}
