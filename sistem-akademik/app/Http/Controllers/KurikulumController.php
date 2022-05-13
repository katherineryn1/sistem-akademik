<?php
namespace App\Http\Controllers;
use App\Modules\Perkuliahan\Service\KurikulumService;
use Illuminate\Http\Request;

class KurikulumController extends Controller{
    public function insert(Request $request){
        $input = $request->validate([
            'inputKode' => ['required'],
            'inputTahun' => ['required'],
            'inputSemester' => ['required'],
            'inputKelas' => ['required'],
            'inputJmlPertemuan' => ['required'],
        ]);

        $input['inputKode'] = trim(explode("|", $input['inputKode'])[0] );
        $hasil = KurikulumService::insert(
            $input['inputTahun'],
            $input['inputSemester'],
            $input['inputKelas'],
            $input['inputJmlPertemuan'],
            $input['inputKode']
            );
        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Kurikulum"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menambah Kurikulum"] ]);
        }
        return back();
    }

    public function delete(Request $request){
        $input = $request->validate([
            'id' => ['required'],
        ]);

        $hasil = KurikulumService::delete($input['id']);
        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menghapus Kurikulum"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menghapus Kurikulum"] ]);
        }
        return back();
    }
}
