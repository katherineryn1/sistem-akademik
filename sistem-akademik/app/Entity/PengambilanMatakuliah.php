<?php
namespace App\Entity;

use App\Entity\Matakuliah;
use App\Entity\Skripsi;
use App\Entity\Roster;
use App\Entity\Dosen;


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