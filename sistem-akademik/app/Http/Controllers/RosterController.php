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
        $tempTanggal = [$input['inputTanggal']];
        for($i=0; $i<$input['inputRotasi']; $i++){
            $dateStart = strtotime($tempTanggal[$i]);
            $dateEnd = strtotime("+1 week", $dateStart);
            array_push($tempTanggal,date('Y-m-d', $dateEnd));
        }
        $input['inputKurikulum'] = intval(trim(explode("-" ,$input['inputKurikulum'])[0]));
        foreach ($tempTanggal as $week){
            echo  $week . "<br>";
            $hasil = RosterService::insert(
                $input['inputKurikulum'],
                $week,
                $input['inputJamMulai'],
                $input['inputJamSelesai'],
                $input['inputRuangan']);

            if($hasil == false){
                $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Jadwal"] ]);
            }else{
                $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menambah Jadwal"] ]);
            }
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
