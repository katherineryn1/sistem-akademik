<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use stdClass;
use App\Modules\Dosen\Service\DosenService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

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

    public function  update(){
        // Todo: Implement
    }

    public function  getJadwalMengajar(){
        $data = $this->getDataJadwalMengajar(0);
        // dd($data);

        return view('dosen.jadwal_mengajar', $data);
    }

    public function getDataJadwalMengajar($week) {
        $nik = request('nik', 10171);
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

    function getIdKurikulum($nik) {
        $db = DB::table('pengambilan_matakuliah_data')
            ->where('nomor_induk', $nik)
            ->select('pengambilan_matakuliah_data.id_kurikulum')
            ->get();
        $data = array();
        foreach ($db as $d) {
            array_push($data, $d->id_kurikulum);
        }

        // Mock
        // $data = ['123556', '123456'];
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

        // Mock
        // $jadwal = new stdClass();
        // $jadwal->tanggal = Carbon::now()->timestamp;
        // $jadwal->jam_mulai = 11;
        // $jadwal->jam_selesai = 13;
        // $jadwal->ruangan = 'R101';
        // $jadwal->nama = 'Rekayasa Perangkat Lunak Lanjut (RPLL)';

        // $jadwal2 = new stdClass();
        // $jadwal2->tanggal = Carbon::yesterday()->timestamp;
        // $jadwal2->jam_mulai = 12;
        // $jadwal2->jam_selesai = 14;
        // $jadwal2->ruangan = 'R102';
        // $jadwal2->nama = 'Komputer Masyarakat';
        // $data = [$jadwal, $jadwal2];
        return $data;
    }

    public function  getRekapMengajar(){
        //  Todo: Implement
    }

    public function  getKehadiranMengajar() {
        $nik = request('nik', 10171);
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

        // Mock
        // $mk1 = new stdClass();
        // $mk1->kode_matkul = 101;
        // $mk1->nama = 'Rekayasa Perangkat Lunak Lanjut';

        // $mk2 = new stdClass();
        // $mk2->kode_matkul = 102;
        // $mk2->nama = 'Komputer Masyarakat';

        // $data = [$mk1, $mk2];
        return $data;
    }

    public function getKelasMatakuliah($kode) {
        $nik = request('nik', 10171);
        $data = DB::table('pengambilan_matakuliah_data')
            ->join('kurikulum_data', 'kurikulum_data.id', '=', 'pengambilan_matakuliah_data.id_kurikulum')
            ->where('pengambilan_matakuliah_data.nomor_induk', '=', $nik)
            ->where('kurikulum_data.kode_matakuliah', '=', $kode)
            ->select('kurikulum_data.id as id_kurikulum', 'kurikulum_data.kelas')
            ->distinct()
            ->get();

        // Mock
        // $kk1 = new stdClass();
        // $kk1->id_kurikulum = 11;
        // $kk1->kelas = 'Kelas A';

        // $kk2 = new stdClass();
        // $kk2->id_kurikulum = 12;
        // $kk2->kelas = 'Kelas B';

        // $data = [$kk1, $kk2];
        return $data;
    }

    public function getTanggalKurikulum($id_kurikulum) {
        $data = DB::table('roster_data')
            ->where('id_kurikulum', '=', $id_kurikulum)
            ->select('tanggal', 'id as id_roster')
            ->distinct()
            ->get();

        // Mock
        // $jadwal1 = new stdClass();
        // $jadwal1->tanggal = Carbon::yesterday()->toDateTimeString();
        // $jadwal1->id_roster = 1;

        // $jadwal2 = new stdClass();
        // $jadwal2->tanggal = Carbon::now()->toDateTimeString();
        // $jadwal2->id_roster = 2;

        // $data = [$jadwal1, $jadwal2];
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

        // Mock
        // $khd1 = new stdClass();
        // $khd1->id_kehadiran = 1;
        // $khd1->nim = 1118001;
        // $khd1->nama = 'Jhon Doe';
        // $khd1->keterangan = 'Hadir';

        // $khd2 = new stdClass();
        // $khd2->id_kehadiran = 2;
        // $khd2->nim = 1118002;
        // $khd2->nama = 'Jhon Doen';
        // $khd2->keterangan = 'Sakit';

        // $khd3 = new stdClass();
        // $khd3->id_kehadiran = 3;
        // $khd3->nim = 1118003;
        // $khd3->nama = 'Jhon Doer';
        // $khd3->keterangan = 'Alpha';

        // $data = [$khd1, $khd2, $khd3];
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

        // Mock
        // $khd1 = new stdClass();
        // $khd1->id_kehadiran = 1;
        // $khd1->nim = 1118001;
        // $khd1->nama = 'Jhon Doe';

        // $data = [$khd1];
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

        // Mock
        // $mhs1 = new stdClass();
        // $mhs1->id_nilai = 1;
        // $mhs1->nim = 1118001;
        // $mhs1->nama = 'Jhon Doe';
        // $mhs1->n1 = 70;
        // $mhs1->n2 = 75;
        // $mhs1->n3 = -1;
        // $mhs1->n4 = -1;
        // $mhs1->n5 = -1;
        // $mhs1->nUAS = -1;
        // $mhs1->na = -1;
        // $mhs1->index = '-';

        // $mhs2 = new stdClass();
        // $mhs2->id_nilai = 2;
        // $mhs2->nim = 1118002;
        // $mhs2->nama = 'Jhon Doen';
        // $mhs2->n1 = 80;
        // $mhs2->n2 = -1;
        // $mhs2->n3 = -1;
        // $mhs2->n4 = -1;
        // $mhs2->n5 = -1;
        // $mhs2->nUAS = -1;
        // $mhs2->na = -1;
        // $mhs2->index = '-';

        // $mhs3 = new stdClass();
        // $mhs3->id_nilai = 3;
        // $mhs3->nim = 1118003;
        // $mhs3->nama = 'Jhon Doer';
        // $mhs3->n1 = 100;
        // $mhs3->n2 = 90;
        // $mhs3->n3 = -1;
        // $mhs3->n4 = -1;
        // $mhs3->n5 = -1;
        // $mhs3->nUAS = -1;
        // $mhs3->na = -1;
        // $mhs3->index = '-';

        // $data = [$mhs1, $mhs2, $mhs3];
        return $data;
    }

    public function getNilaiMahasiswaByIdNilai($id_nilai) {
        $data = DB::table('nilai_data as a')
            ->where('a.id', '=', $id_nilai)
            ->select('a.id as id_nilai', 'a.nilai_1 as n1', 'a.nilai_2 as n2', 'a.nilai_3 as n3',
               'a.nilai_4 as n4', 'a.nilai_5 as n5', 'a.nilai_UAS as nUAS', 'a.nilai_akhir as na', 'a.index as index')
            ->first();

        // Mock
        // $mhs = new stdClass();
        // $mhs->id_nilai = $id_nilai;
        // switch($id_nilai) {
        //     case(1):
        //         $mhs->n1 = 70;
        //         $mhs->n2 = 75;
        //         break;
        //     case(2):
        //         $mhs->n1 = 80;
        //         $mhs->n2 = -1;
        //         break;
        //     default:
        //         $mhs->n1 = 100;
        //         $mhs->n2 = 90;
        //         break;
        // }
        // $mhs->n3 = -1;
        // $mhs->n4 = -1;
        // $mhs->n5 = -1;
        // $mhs->nUAS = -1;
        // $mhs->na = -1;
        // $mhs->index = '-';

        // $data = $mhs;
        return $data;
    }

    public function updateNilaiMahasiswa(Request $request, $id_nilai) {
        DB::beginTransaction();
        try {
            $arr_nilai = $request->nilai;
            $na = $request->nilai_akhir;
            $index = $request->index;

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

    public function bimbunganSkripsi(){
        //  Todo: Implement
    }

    public function validasiSkripsi(){
        //  Todo: Implement
    }
}
