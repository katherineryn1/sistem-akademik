<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use stdClass;
use App\Modules\Dosen\Service\DosenService;
use App\Modules\Skripsi\Service\SkripsiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DosenController extends Controller{

    public function  insert(Request $request){
        $input = $request->validate([
            'inputNama' => ['required'],
            'inputPassword' => ['required'],
            'inputNomorInduk' => ['required', 'unique:users_data,nomor_induk'],
            'inputEmail' => ['required' , 'unique:users_data,email'],
            'inputTanggalLahir' => ['required'],
            'inputTempatLahir' => ['required'],
            'inputJenisKelamin' => ['required'],
            'inputAlamat' => ['required'],
            'inputNoTelp' => ['required'],
            'inputProgramStudi' => ['required'],
            'inputBidangIlmu' => ['required'],
            'inputGelarAkademik' => ['required'],
            'inputStatusIkatanKerja' => ['required'],
            'inputStatusDosen' => ['required'],
        ]);

        if (!$request->hasFile('inputFotoProfile')) {
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Dosen - Foto tidak diterima"] ]);
            return back();
        }

        $file = $request->file('inputFotoProfile');
        $photoProfileDir = $file->store('profile', 'public');
        if($photoProfileDir == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Dosen - Foto gagal disimpan"] ]);
            return back();
        }

        $hasil = DosenService::insert(
            $input['inputNama'],
            $input['inputPassword'],
            $input['inputNomorInduk'],
            $input['inputEmail'],
            $input['inputTanggalLahir'],
            $input['inputTempatLahir'],
            $input['inputJenisKelamin'],
            $input['inputAlamat'],
            $input['inputNoTelp'],
            "Dosen",
            $photoProfileDir,
            $input['inputProgramStudi'],
            $input['inputBidangIlmu'],
            $input['inputGelarAkademik'],
            $input['inputStatusIkatanKerja'],
            $input['inputStatusDosen']);

        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Dosen"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menambah Dosen"] ]);
        }
        return back();
    }

    public function delete(Request $request){
        $input = $request->validate([
            'nomor_induk' => ['required'],
        ]);
        if(DosenService::delete($input['nomor_induk']) == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Hapus Dosen"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Hapus Dosen"] ]);
        }
        return back();
    }

    public function  getJadwalMengajar(Request $request){
        $data = $this->getDataJadwalMengajar(0, $request);
        // dd($data);

        return view('dosen.jadwal_mengajar', $data);
    }

    public function getDataJadwalMengajar($week, Request $request) {
        $nik = $request->session()->get('currentuser', null)['nomor_induk'];
        $arr_id_kurikulum = $this->getIdKurikulum($nik);

        $now = $this->getDayBasedWeek($week);
        $start = $now->startOfWeek(Carbon::SUNDAY);
        $now = $this->getDayBasedWeek($week);
        $end = $now->endOfWeek(Carbon::SATURDAY);
        $week = "{$start->day} - {$end->day} {$end->format('F')} {$end->year}";

        $data_jadwal_mengajar = $this->getJadwal($arr_id_kurikulum, $start, $end);
        $arr_jadwal_mengajar = array();
        for ($i = 0; $i < count($data_jadwal_mengajar); $i++) {
            $mulai = explode(':', $data_jadwal_mengajar[$i]->jam_mulai);
            $mulai = (int)$mulai[0] + ((int)$mulai[1]/60);
            $selesai = explode(':', $data_jadwal_mengajar[$i]->jam_selesai);
            $selesai = (int)$selesai[0] + ((int)$selesai[1]/60);

            $tanggal = Carbon::createFromFormat('Y-m-d', $data_jadwal_mengajar[$i]->tanggal);
            $string_tanggal = "{$tanggal->dayOfWeek}-{$mulai}";
            $lama_mengajar = $selesai - $mulai;

            $jadwal = [
                'tanggal' => $data_jadwal_mengajar[$i]->tanggal,
                'jam_mulai' => $data_jadwal_mengajar[$i]->jam_mulai,
                'jam_selesai' => $data_jadwal_mengajar[$i]->jam_selesai,
                'ruangan' => $data_jadwal_mengajar[$i]->ruangan,
                'nama' => $data_jadwal_mengajar[$i]->nama,
                'string_tanggal' => $string_tanggal,
                'lama_mengajar' => $lama_mengajar,
                'mulai' => $mulai,
                'selesai' => $selesai,
            ];
            array_push($arr_jadwal_mengajar, $jadwal);
        }

        $arr_tanggal = array();
        $arr_short_day_name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thr', 'Fri', 'Sat'];
        for ($i = 0; $i < 7; $i++) {
            $str = strval($arr_short_day_name[$i]) . " " . strval($start->day);
            array_push($arr_tanggal, $str);
            $start->addDay();
        }

        $arr_jadwal = array();
        for ($i = 0; $i <= 12; $i++) {
            array_push($arr_jadwal, array(1, 1, 1, 1, 1, 1, 1));
        }

        return [
            'week' => $week,
            'jadwal_mengajar' => $arr_jadwal_mengajar,
            'jadwal' => $arr_jadwal,
            'tanggal' => $arr_tanggal,
        ];
    }

    public function  getJadwalMengajarDashboard(Request $request){
        $nik = $request->session()->get('currentuser', null)['nomor_induk'];
        $arr_id_kurikulum = $this->getIdKurikulum($nik);
        $tanggal_hari_ini = Carbon::now()->format("Y-m-d");

        $data_jadwal_mengajar = $this->getJadwalDashboard($arr_id_kurikulum, $tanggal_hari_ini);
        $data_pengumuman = $this->getPengumumanDashboard();

        $arr_jadwal_mengajar = array();
        for ($i = 0; $i < count($data_jadwal_mengajar); $i++) {
            $tanggal = Carbon::parse($data_jadwal_mengajar[$i]->tanggal)->locale('id');

            $jadwal = [
                'tanggal' => $tanggal->isoFormat('dddd, D MMMM'),
                'jam_mulai' => $data_jadwal_mengajar[$i]->jam_mulai,
                'jam_selesai' => $data_jadwal_mengajar[$i]->jam_selesai,
                'nama' => $data_jadwal_mengajar[$i]->nama
            ];
            array_push($arr_jadwal_mengajar, $jadwal);
        }

        $arr_pengumuman = array();
        for ($i = 0; $i < count($data_pengumuman); $i++) {
            $tanggal = Carbon::parse($data_pengumuman[$i]->tanggal)->locale('id');

            $pengumuman = [
                'tanggal' => $tanggal->isoFormat('D MMMM'),
                'judul' => $data_pengumuman[$i]->judul,
                'keterangan' => $data_pengumuman[$i]->keterangan
            ];
            array_push($arr_pengumuman, $pengumuman);
        }


        return view('dosen.dashboard', [
            'tanggalHariIni' => Carbon::parse($tanggal_hari_ini)->locale('id')->isoFormat('D MMMM'),
            'jadwalMengajar' => $arr_jadwal_mengajar,
            'pengumuman' => $arr_pengumuman,
        ]);
    }

    function getIdKurikulum($nik) {
        $db = DB::table('pengambilan_matakuliah_data')
            ->where('nomor_induk', $nik)
            ->select('pengambilan_matakuliah_data.id_kurikulum')
            ->get();
        $data = array();
        foreach ($db as $d) {
            array_push($data, $d->id_kurikulum);
        }

        return $data;
    }

    function getDayBasedWeek($week) {
        if ($week == 0) {
            return Carbon::now();
        } else {
            return Carbon::now()->addDays($week*7);
        }
    }

    function getJadwal($arr_id_kurikulum, $start_date, $end_date) {
        $data = DB::table('roster_data')
            ->join('kurikulum_data', 'kurikulum_data.id', '=', 'roster_data.id_kurikulum')
            ->join('matakuliah_data', 'matakuliah_data.kode', '=', 'kurikulum_data.kode_matakuliah')
            ->whereIn('roster_data.id_kurikulum', $arr_id_kurikulum)
            ->whereBetween('roster_data.tanggal', [$start_date, $end_date])
            ->select('roster_data.tanggal as tanggal',
                'roster_data.jam_mulai as jam_mulai',
                'roster_data.jam_selesai as jam_selesai',
                'roster_data.ruangan as ruangan',
                'matakuliah_data.nama as nama')
            ->get();

        return $data;
    }

    function getJadwalDashboard($arr_id_kurikulum, $tanggal_hari_ini) {
        $data = DB::table('roster_data')
            ->join('kurikulum_data', 'kurikulum_data.id', '=', 'roster_data.id_kurikulum')
            ->join('matakuliah_data', 'matakuliah_data.kode', '=', 'kurikulum_data.kode_matakuliah')
            ->whereIn('roster_data.id_kurikulum', $arr_id_kurikulum)
            ->where('roster_data.tanggal', $tanggal_hari_ini)
            ->select('roster_data.tanggal as tanggal',
                'roster_data.jam_mulai as jam_mulai',
                'roster_data.jam_selesai as jam_selesai',
                'matakuliah_data.nama as nama')
            ->orderBy('roster_data.jam_mulai', 'asc')
            ->get();

        return $data;
    }

    function getPengumumanDashboard() {
        $data = DB::table('pengumuman_data')
            ->select('pengumuman_data.tanggal as tanggal',
                'pengumuman_data.judul as judul',
                'pengumuman_data.keterangan as keterangan',)
            ->orderBy('pengumuman_data.tanggal', 'desc')
            ->limit(3)
            ->get();

        return $data;
    }

    public function  getKehadiranMengajar(Request $request) {
        $nik = $request->session()->get('currentuser', null)['nomor_induk'];
        $arr_matakuliah = $this->getMatakuliah($nik);

        return view('dosen.absensi', [
            'matakuliah' => $arr_matakuliah,
        ]);
    }

    public function getMatakuliah($nik) {
        $data = DB::table('pengambilan_matakuliah_data')
            ->join('kurikulum_data', 'kurikulum_data.id', '=', 'pengambilan_matakuliah_data.id_kurikulum')
            ->join('matakuliah_data', 'matakuliah_data.kode', '=', 'kurikulum_data.kode_matakuliah')
            ->where('pengambilan_matakuliah_data.nomor_induk', '=', $nik)
            ->select('matakuliah_data.kode as kode_matkul', 'matakuliah_data.nama as nama')
            ->distinct()
            ->get();

        return $data;
    }

    public function getKelasMatakuliah($kode, Request $request) {
        $nik = $request->session()->get('currentuser', null)['nomor_induk'];
        $data = DB::table('pengambilan_matakuliah_data')
            ->join('kurikulum_data', 'kurikulum_data.id', '=', 'pengambilan_matakuliah_data.id_kurikulum')
            ->where('pengambilan_matakuliah_data.nomor_induk', '=', $nik)
            ->where('kurikulum_data.kode_matakuliah', '=', $kode)
            ->select('kurikulum_data.id as id_kurikulum', 'kurikulum_data.kelas')
            ->distinct()
            ->get();

        return $data;
    }

    public function getTanggalKurikulum($id_kurikulum) {
        $data = DB::table('roster_data')
            ->where('id_kurikulum', '=', $id_kurikulum)
            ->select('tanggal', 'id as id_roster')
            ->distinct()
            ->get();

        return $data;
    }

    public function getKehadiranMahasiswa($id_roster, $id_kurikulum) {
        $data_size = DB::table('kehadiran_data as a')
            ->join('pengambilan_matakuliah_data as b', 'b.id', '=', 'a.id_pengambilan_matakuliah')
            ->where('a.id_roster', '=', $id_roster)
            ->where('b.posisi_ambil', '=', 1)
            ->count();

        if ($data_size == 0) {
            // Belum ada data kehadiran -> isi dulu mahasiswanya
            $fill_kehadiran_data = DB::table('pengambilan_matakuliah_data')
                ->where('id_kurikulum', '=', $id_kurikulum)
                ->where('posisi_ambil', '=', 1)
                ->select('id')
                ->get();

            $insert_data = array();
            foreach ($fill_kehadiran_data as $fill) {
                $data = new stdClass();
                $data->id_pengambilan_matakuliah = $fill->id;
                $data->keterangan = 3;
                $data->id_roster = $id_roster;
                array_push($insert_data, (array)$data);
            }

            DB::table('kehadiran_data')->insert((array) $insert_data);
        }

        $data = DB::table('kehadiran_data as a')
            ->join('pengambilan_matakuliah_data as b', 'b.id', '=', 'a.id_pengambilan_matakuliah')
            ->join('mahasiswa_data as c', 'c.nomor_induk', '=', 'b.nomor_induk')
            ->join('users_data as d', 'd.nomor_induk', '=', 'c.nomor_induk')
            ->where('a.id_roster', '=', $id_roster)
            ->select('a.id as id_kehadiran', 'c.nomor_induk as nim', 'd.nama as nama', 'a.keterangan')
            ->get();

        return $data;
    }

    public function getKehadiranMahasiswaByStatus($id_roster, $id_kurikulum, $status) {
        $data = DB::table('kehadiran_data as a')
            ->join('pengambilan_matakuliah_data as b', 'b.id', '=', 'a.id_pengambilan_matakuliah')
            ->join('mahasiswa_data as c', 'c.nomor_induk', '=', 'b.nomor_induk')
            ->join('users_data as d', 'd.nomor_induk', '=', 'c.nomor_induk')
            ->where('a.id_roster', '=', $id_roster)
            ->where('a.keterangan', '=', $status)
            ->select('a.id as id_kehadiran', 'c.nomor_induk as nim', 'd.nama as nama', 'a.keterangan')
            ->get();

        return $data;
    }

    public function updateKehadiranMahasiswa(Request $request) {
        DB::beginTransaction();
        try {
            $data = $request->all();
            foreach ($data as $key => $value) {
                $sql_statement = "UPDATE `kehadiran_data` SET `keterangan` = {$value} WHERE `id` = {$key}";
                DB::update($sql_statement);
            }

            DB::commit();
            return 'Success';
        } catch (\Exception $e) {
            DB::rollBack();
            return 'Failed';
        }
    }

    public function getNilaiMahasiswa() {
        $nik = request('nik', 10171);
        $arr_matakuliah = $this->getMatakuliah($nik);

        return view('dosen.nilai_mahasiswa', [
            'matakuliah' => $arr_matakuliah,
        ]);
    }

    public function getListNilaiMahasiswa($id_kurikulum) {
        $data_size = DB::table('nilai_data as a')
            ->join('pengambilan_matakuliah_data as b', 'b.id', '=', 'a.pengambilan_matakuliah')
            ->where('b.id_kurikulum', '=', $id_kurikulum)
            ->count();

        if ($data_size == 0) {
            // Belum ada data mahasiswa di nilai_data -> isi dulu
            $fill_nilai_data = DB::table('pengambilan_matakuliah_data')
                ->where('id_kurikulum', '=', $id_kurikulum)
                ->where('posisi_ambil', '=', 1)
                ->select('id')
                ->get();

            $insert_data = array();
            foreach ($fill_nilai_data as $fill) {
                $data = new stdClass();
                $data->nilai_1 = -1;
                $data->nilai_2 = -1;
                $data->nilai_3 = -1;
                $data->nilai_4 = -1;
                $data->nilai_5 = -1;
                $data->nilai_UAS = -1;
                $data->nilai_akhir = -1;
                $data->index = '-';
                $data->pengambilan_matakuliah = $fill->id;
                array_push($insert_data, (array)$data);
            }

            DB::table('nilai_data')->insert((array) $insert_data);
        }

        $data = DB::table('nilai_data as a')
            ->join('pengambilan_matakuliah_data as b', 'b.id', '=', 'a.pengambilan_matakuliah')
            ->join('users_data as c', 'c.nomor_induk', '=', 'b.nomor_induk')
            ->where('b.id_kurikulum', '=', $id_kurikulum)
            ->select('a.id as id_nilai', 'b.nomor_induk as nim', 'c.nama as nama', 'a.nilai_1 as n1', 'a.nilai_2 as n2',
                'a.nilai_3 as n3', 'a.nilai_4 as n4', 'a.nilai_5 as n5', 'a.nilai_UAS as nUAS', 'a.nilai_akhir as na', 'a.index as index')
            ->get();

        return $data;
    }

    public function getNilaiMahasiswaByIdNilai($id_nilai) {
        $data = DB::table('nilai_data as a')
            ->where('a.id', '=', $id_nilai)
            ->select('a.id as id_nilai', 'a.nilai_1 as n1', 'a.nilai_2 as n2', 'a.nilai_3 as n3',
               'a.nilai_4 as n4', 'a.nilai_5 as n5', 'a.nilai_UAS as nUAS', 'a.nilai_akhir as na', 'a.index as index')
            ->first();

        return $data;
    }

    public function updateNilaiMahasiswa(Request $request, $id_nilai) {
        DB::beginTransaction();
        try {
            $arr_nilai = $request['nilai'];
            $na = $request['nilai_akhir'];
            $index = $request['index'];

            $sql_statement = "UPDATE `nilai_data` SET `nilai_1` = {$arr_nilai[0]}, `nilai_2` = {$arr_nilai[1]}, `nilai_3` = {$arr_nilai[2]}, `nilai_4` = {$arr_nilai[3]}, `nilai_5` = {$arr_nilai[4]}, `nilai_UAS` = {$arr_nilai[5]}, `nilai_akhir` = {$na}, `index` = '{$index}' WHERE `id` = $id_nilai";
            DB::update($sql_statement);
            DB::commit();
            return 'Success';
        } catch (\Exception $e) {
            DB::rollBack();
            return 'Failed';
        }
    }

    public function  addMatakuliah(){
        //  Todo: Implement
    }

    public function  lakukanAbsensi(){
        //  Todo: Implement
    }

    public function getBimbinganSkripsi($nik, $is_accepted){
        $data = DB::table('skripsi_data as sd')
            ->join('users_data as ud', 'ud.nomor_induk', '=', 'sd.nim')
            ->where('sd.nik', '=', $nik)
            ->where('sd.is_accepted', '=', $is_accepted)
            ->select('sd.id as id',
                'sd.nim as nim',
                'ud.nama as nama',
                'sd.judul as judul',
                'sd.milestone as milestone')
            ->get();
        return $data;
    }

    public function getDataSkripsi($id_skripsi) {
        $data = DB::table('skripsi_data as sd')
            ->join('users_data as ud', 'ud.nomor_induk', '=', 'sd.nik')
            ->where('sd.id', '=', $id_skripsi)
            ->select('sd.id as id',
                'sd.nik as nik',
                'ud.nama as nama',
                'sd.judul as judul',
                'sd.milestone as milestone')
            ->first();
        return $data;
    }

    public function getKomentarTerakhir($id_skripsi) {
        $data = DB::table('detail_skripsi_data')
            ->where('id_skripsi', '=', $id_skripsi)
            ->select('label', 'komentar')
            ->orderBy('id', 'desc')
            ->first();
        return $data;
    }

    public function getDetailSkripsi($id_skripsi) {
        $data = DB::table('detail_skripsi_data')
            ->where('id_skripsi', '=', $id_skripsi)
            ->select('label', 'komentar', 'is_accepted')
            ->orderBy('id', 'desc')
            ->get();
        return $data;
    }

    public function bimbinganSkripsi(){
        $arr_list_skripsi = $this->getBimbinganSkripsi('10171', 1);

        $arr_skripsi = array();
        foreach($arr_list_skripsi as $skripsi) {
            $data = new stdClass();
            $data->id = $skripsi->id;
            $data->nim = $skripsi->nim;
            $data->nama = $skripsi->nama;
            $data->judul = $skripsi->judul;

            $data_komentar = $this->getKomentarTerakhir($skripsi->id);
            // dd($data_komentar);

            if ($skripsi->milestone == 0) {
                $data->milestone = 'Belum dimulai';
                $data->komentar = '';
            } else {
                $data->milestone = $data_komentar->label;
                $data->komentar = $data_komentar->komentar;
            }
            array_push($arr_skripsi, $data);
        }

        return view('dosen.tracking_skripsi_home', [
            'skripsi' => $arr_skripsi,
        ]);
    }

    public function addBimbinganSkripsi(){
        $arr_list_skripsi = $this->getBimbinganSkripsi('10171', 0);

        $arr_skripsi = array();
        foreach($arr_list_skripsi as $skripsi) {
            $data = new stdClass();
            $data->id = $skripsi->id;
            $data->nim = $skripsi->nim;
            $data->nama = $skripsi->nama;
            $data->judul = $skripsi->judul;
            array_push($arr_skripsi, $data);
        }

        return view('dosen.tracking_skripsi_add_mhs', [
            'skripsi' => $arr_skripsi,
        ]);
    }

    public function detailBimbinganSkripsi($id_skripsi) {
        $data_skripsi = $this->getDataSkripsi($id_skripsi);
        $skripsi = new stdClass();
        $skripsi->id = $data_skripsi->id;
        $skripsi->nik = $data_skripsi->nik;
        $skripsi->nama = $data_skripsi->nama;
        $skripsi->judul = $data_skripsi->judul;
        $skripsi->milestone = $data_skripsi->milestone;
        // dd($skripsi);

        $data_detail_skripsi = $this->getDetailSkripsi($id_skripsi);
        $arr_komentar = array();
        foreach ($data_detail_skripsi as $detail) {
            $komentar = new stdClass();
            $komentar->label = $detail->label;
            $komentar->komentar = $detail->komentar;
            $komentar->is_accepted = $detail->is_accepted;
            array_push($arr_komentar, $komentar);
        }

        return view('dosen.tracking_skripsi_mhs', [
            'skripsi' => $skripsi,
            'komentar' => $arr_komentar,
        ]);
    }

    public function editDetailBimbinganSkripsi($id_skripsi) {
        $data_skripsi = $this->getDataSkripsi($id_skripsi);
        $skripsi = new stdClass();
        $skripsi->id = $data_skripsi->id;
        $skripsi->nik = $data_skripsi->nik;
        $skripsi->nama = $data_skripsi->nama;
        $skripsi->judul = $data_skripsi->judul;
        $skripsi->milestone = $data_skripsi->milestone;
        // dd($skripsi);

        $data_detail_skripsi = $this->getDetailSkripsi($id_skripsi);
        $arr_komentar = array();
        foreach ($data_detail_skripsi as $detail) {
            $komentar = new stdClass();
            $komentar->label = $detail->label;
            $komentar->komentar = $detail->komentar;
            $komentar->is_accepted = $detail->is_accepted;
            array_push($arr_komentar, $komentar);
        }

        return view('dosen.tracking_skripsi_edit_komentar', [
            'skripsi' => $skripsi,
            'komentar' => $arr_komentar,
        ]);
    }

    public function validasiSkripsi(){
        //  Todo: Implement
    }

    public function deleteMahasiswaSkripsi($id){
        if(SkripsiService::delete($id) == true){
            echo "Success Delete";
        }else{
            echo "Gagal Delete";
        }
    }

    public function showProfileDosen(Request $request) {
        $user = $request->session()->get('currentuser', null);

        $data = DB::table('dosen_data as dd')
            ->join('users_data as ud', 'ud.nomor_induk', '=', 'dd.nomor_induk')
            ->where('dd.nomor_induk', '=', $user['nomor_induk'])
            ->select('dd.nomor_induk as nik',
                'ud.nama as nama',
                'dd.program_studi as program_studi',
                'ud.email as email',
                'ud.tanggal_lahir as tanggal_lahir',
                'ud.tempat_lahir as tempat_lahir',
                'ud.jenis_kelamin as jenis_kelamin',
                'ud.notelepon as no_telepon')
            ->first();

        return view('dosen.profil', [
            'profil' => $data
        ]);
    }
}
