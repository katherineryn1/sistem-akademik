<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilanMatakuliah{

	private $id;
	private $tahun;
	private $semester;
	private $kelas;
	private $jumlahPertemuan;
	public $m_Matakuliah;
	public $m_Skripsi;
	public $m_Nilai;
	public $m_Roster;
	public $m_Dosen;

	function __construct()
	{
	}

	function __destruct()
	{
	}


	public function hitungKehadiran()
	{
	}
}

class PengambilanMatakuliah extends Model
{
    use HasFactory;
}
