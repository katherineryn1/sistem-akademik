<?php
namespace App\Modules\Perkuliahan\Entity;

use App\Modules\Perkuliahan;
use App\Modules\Dosen\Entity;


class PengambilanMatakuliah{
	private int $id;
	private int $tahun;
	private string $semester;
	private string $kelas;
	private int $jumlahPertemuan;
	private Matakuliah $matakuliah;
	private Skripsi $skripsi;
	private Nilai $nilai;
	private Roster $roster;
	private Dosen $dosen;

	function __construct()
	{
	}

	function __destruct()
	{
	}

	public function hitungKehadiran(){
	}
}




?>
