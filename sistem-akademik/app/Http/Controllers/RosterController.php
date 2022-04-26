<?php
namespace App\Http\Controllers;


use App\Modules\Perkuliahan\Service\RosterService;
use Illuminate\Http\Request;

class RosterController extends Controller{
    public function insert(Request $request){
        $input = $request->validate([
            'inputKurikulum' => ['required'],
            'inputTanggal' => ['required'],
            'inputRotasi' => ['required'],
            'inputJamMulai' => ['required'],
            'inputJamSelesai' => ['required'],
            'inputRuangan' => ['required'],
        ]);
        $tempTanggal = $input['inputTanggal'];
        $hasil = true;
        for($i=0; $i<$input['inputRotasi'] && $hasil==true; $i++){
            $hasil = RosterService::insert(
                $input['inputKurikulum'],
                $tempTanggal,
                $input['inputJamMulai'],
                $input['inputJamSelesai'],
                $input['inputRuangan']);

            $start_date = $tempTanggal;
            $dateStart = strtotime($start_date);
            $dateEnd = strtotime("+7 day", $dateStart);
            $tempTanggal = date('Y-m-d', $dateEnd);

        }

        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Jadwal"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menambah Jadwal"] ]);
        }
        return back();
    }

    public function delete(Request $request){
        $input = $request->validate([
            'id' => ['required'],
        ]);

        $hasil = RosterService::delete($input['id']);
        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menghapus Jadwal"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menghapus Jadwal"] ]);
        }
        return back();
    }
}
