<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use stdClass;
use App\Modules\Dosen\Service\DosenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller{
    public function  insertNewDosen(){
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
        $nik = request('nik', 111001);
        $arr_id_kurikulum = $this->getIdKurikulum($nik);

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

    function getIdKurikulum($nik) {
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

    public function  getKehadiranMengajar() {
        $nik = request('nik', 111001);
        $arr_matakuliah = $this->getMatakuliah($nik);

        return view('dosen.absensi', [
            'matakuliah' => $arr_matakuliah,
        ]);
    }

    public function getKehadiranKelas($id) {
        $nik = request('nik', 111001);
        return $this->getKelasMatakuliah($nik, $id);
    }

    public function getKehadiranTanggal($id) {
        return $this->getTanggalKurikulum($id);
    }

    public function getRosterKehadiran($id_roster, $id_kurikulum) {
        return $this->getKehadiranMahasiswa($id_roster, $id_kurikulum);
    }

    function getMatakuliah($nik) {
        // $data = DB::table('pengambilan_matakuliah_data')
        //     ->join('kurikulum_data', 'kurikulum_data.id', '=', 'pengambilan_matakuliah_data.id_kurikulum')
        //     ->join('matakuliah_data', 'matakuliah_data.kode', '=', 'kurikulum_data.kode_matakuliah')
        //     ->where('pengambilan_matakuliah_data.nomor_induk', '=', $nik)
        //     ->select('matakuliah_data.kode as kode', 'matakuliah_data.nama as nama')
        //     ->distinct()
        //     ->get();

        // Mock
        $mk1 = new stdClass();
        $mk1->kode_matkul = 101;
        $mk1->nama = 'Rekayasa Perangkat Lunak Lanjut';

        $mk2 = new stdClass();
        $mk2->kode_matkul = 102;
        $mk2->nama = 'Komputer Masyarakat';

        $data = [$mk1, $mk2];
        return $data;
    }

    function getKelasMatakuliah($nik, $kode) {
        // $data = DB::table('pengambilan_matakuliah_data')
        //     ->join('kurikulum_data', 'kurikulum_data.id', '=', 'pengambilan_matakuliah_data.id_kurikulum')
        //     ->where('pengambilan_matakuliah_data.nomor_induk', '=', $nik)
        //     ->where('kurikulum_data.kode_matakuliah', '=', $kode)
        //     ->select('kurikulum_data.id as id_kurikulum', 'kurikulum_data.kelas')
        //     ->distinct()
        //     ->get();

        // Mock
        $kk1 = new stdClass();
        $kk1->id_kurikulum = 11;
        $kk1->kelas = 'Kelas A';

        $kk2 = new stdClass();
        $kk2->id_kurikulum = 12;
        $kk2->kelas = 'Kelas B';

        $data = [$kk1, $kk2];
        return $data;
    }

    function getTanggalKurikulum($id_kurikulum) {
        // $data = DB::table('roster_data')
        //     ->where('id_kurikulum', '=', $id_kurikulum)
        //     ->select('tanggal', 'id as id_roster')
        //     ->distinct()
        //     ->get();

        // Mock
        $jadwal1 = new stdClass();
        $jadwal1->tanggal = Carbon::yesterday()->toDateTimeString();
        $jadwal1->id_roster = 1;

        $jadwal2 = new stdClass();
        $jadwal2->tanggal = Carbon::now()->toDateTimeString();
        $jadwal2->id_roster = 2;

        $data = [$jadwal1, $jadwal2];
        return $data;
    }

    function getKehadiranMahasiswa($id_roster, $id_kurikulum) {
        // $dataSize = DB::table('kehadiran_data')
        //     ->where('id_roster', '=', $id_roster)
        //     ->count();

        // if ($dataSize == 0) {
        //     // Belum ada data kehadiran -> isi dulu mahasiswanya
        //     $fill_kehadiran_data = DB::table('pengambilan_matakuliah_data')
        //         ->where('id_kurikulum', '=', $id_kurikulum)
        //         ->where('posisi_ambil', '=', 'Mahasiswa')
        //         ->select('id')
        //         ->get();

        //     $insert_data = array();
        //     foreach ($fill_kehadiran_data as $data) {
        //         $data = new stdClass();
        //         $data->id_pengambilan_matakuliah = $data->id;
        //         $data->keterangan = 'Alpha';
        //         $data->id_roster = $id_roster;
        //         array_push($insert_data, $data);
        //     }

        //     DB::table('kehadiran_data')->insert($insert_data);
        // }

        // $data = DB::table('kehadiran_data as a')
        //     ->join('pengambilan_matakuliah_data as b', 'b.id', '=', 'a.id_pengambilan_kelas')
        //     ->join('mahasiswa_data as c', 'c.nomor_induk', '=', 'b.nomor_induk')
        //     ->join('users_data as d', 'd.nomor_induk', '=', 'c.nomor_induk')
        //     ->where('a.id_roster', '=', $id_roster)
        //     ->select('a.id as id_kehadiran', 'c.nomor_induk as nim', 'd.nama as nama', 'a.keterangan')
        //     ->get();

        // Mock
        $khd1 = new stdClass();
        $khd1->id_kehadiran = 1;
        $khd1->nim = 1118001;
        $khd1->nama = 'Jhon Doe';
        $khd1->keterangan = 'Hadir';

        $khd2 = new stdClass();
        $khd2->id_kehadiran = 2;
        $khd2->nim = 1118002;
        $khd2->nama = 'Jhon Doen';
        $khd2->keterangan = 'Sakit';

        $khd3 = new stdClass();
        $khd3->id_kehadiran = 3;
        $khd3->nim = 1118003;
        $khd3->nama = 'Jhon Doer';
        $khd3->keterangan = 'Alpha';

        $data = [$khd1, $khd2, $khd3];
        return $data;
    }

    public function getKehadiranMahasiswaByStatus($id_roster, $id_kurikulum, $status) {
        // $data = DB::table('kehadiran_data as a')
        //     ->join('pengambilan_matakuliah_data as b', 'b.id', '=', 'a.id_pengambilan_kelas')
        //     ->join('mahasiswa_data as c', 'c.nomor_induk', '=', 'b.nomor_induk')
        //     ->join('users_data as d', 'd.nomor_induk', '=', 'c.nomor_induk')
        //     ->where('a.id_roster', '=', $id_roster)
        //     ->where('a.keterangan', '=', $status)
        //     ->select('a.id as id_kehadiran', 'c.nomor_induk as nim', 'd.nama as nama', 'a.keterangan')
        //     ->get();

        // Mock
        $khd1 = new stdClass();
        $khd1->id_kehadiran = 1;
        $khd1->nim = 1118001;
        $khd1->nama = 'Jhon Doe';

        $data = [$khd1];
        return $data;
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
