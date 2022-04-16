<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use stdClass;
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
        // Todo: Implement
    }

    public function  getJadwalMengajar(){
        $arr_id_kurikulum = $this->getIdKurikulum();

        $now = Carbon::now();
        $start = $now->startOfWeek(Carbon::SUNDAY);
        $now = Carbon::now();
        $end = $now->endOfWeek(Carbon::SATURDAY);
        $week = "{$start->day} - {$end->day} {$start->format('F')} {$start->year}";
        $day_today = $start->day;

        $arr_jadwal_mengajar = $this->getJadwal($arr_id_kurikulum, $start, $end);
        for ($i = 0; $i < count($arr_jadwal_mengajar); $i++) {
            $tanggal = Carbon::createFromTimestamp($arr_jadwal_mengajar[$i]->tanggal);
            $string_tanggal = "{$tanggal->dayOfWeek}-{$arr_jadwal_mengajar[$i]->jam_mulai}";
            // dd($string_tanggal);
            $lama_mengajar = $arr_jadwal_mengajar[$i]->jam_selesai - $arr_jadwal_mengajar[$i]->jam_mulai;
            $arr_jadwal_mengajar[$i]->string_tanggal = $string_tanggal;
            $arr_jadwal_mengajar[$i]->lama_mengajar = $lama_mengajar;
        }
        // dd($arr_jadwal_mengajar);

        $arr_jadwal = array();
        for ($i = 0; $i <= 12; $i++) {
            array_push($arr_jadwal, array(1, 1, 1, 1, 1, 1, 1));
        }

        return view('dosen.jadwal_mengajar', [
            'week' => $week,
            'day_today' => $day_today,
            'jadwal_mengajar' => $arr_jadwal_mengajar,
            'jadwal' => $arr_jadwal,
        ]);
    }

    function getIdKurikulum() {
        // $data = DB::table('pengambilan_matakuliah_data')
        //     ->where('nomor_induk', $nik)
        //     ->select('pengambilan_matakuliah_data.id_kurikulum')
        //     ->get();

        // Mock
        $data = ['123556', '123456'];
        return $data;
    }

    function getJadwal($arr_id_kurikulum, $start_date, $end_date) {
        // $data = DB::table('roster_data')
        //     ->join('kurikulum_data', 'kurikulum_data.id', '=', 'roster_data.id_kurikulum')
        //     ->join('matakuliah_data', 'matakuliah_data.kode', '=', 'kurikulum_data.kode_matakuliah')
        //     ->whereIn('roster_data.id_kurikulum', $arrIdKurikulum)
        //     ->whereBetween('roster_data.tanggal', [$start_date, $end_date])
        //     ->select('roster_data.tanggal as tanggal',
        //         'roster_data.jam_mulai as jam_mulai',
        //         'roster_data.jam_selesai as jam_selesai',
        //         'roster_data.ruangan as ruangan',
        //         'matakuliah_data.nama as nama')
        //     ->get();

        // Mock
        $jadwal = new stdClass();
        $jadwal->tanggal = Carbon::now()->timestamp;
        $jadwal->jam_mulai = 11;
        $jadwal->jam_selesai = 13;
        $jadwal->ruangan = 'R101';
        $jadwal->nama = 'Rekayasa Perangkat Lunak Lanjut (RPLL)';

        $jadwal2 = new stdClass();
        $jadwal2->tanggal = Carbon::yesterday()->timestamp;
        $jadwal2->jam_mulai = 12;
        $jadwal2->jam_selesai = 14;
        $jadwal2->ruangan = 'R102';
        $jadwal2->nama = 'Komputer Masyarakat';
        $data = [$jadwal, $jadwal2];
        return $data;
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
