<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaEntity extends UserEntity{

	private $jurusan;
	private $tahunMasuk;
	private $tahunLulus;
	private $RencanaStudi;
	
	function __construct()
	{
	}

	function __destruct()
	{
	}



}

class Mahasiswa extends Model
{
    use HasFactory;
}
