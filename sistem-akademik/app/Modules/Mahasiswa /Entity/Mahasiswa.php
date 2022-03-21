<?php
namespace App\Entity;

use App\Entity\RencanaStudi;

class Mahasiswa extends User{
	private string $jurusan;
	private int $tahunMasuk;
	private int $tahunLulus;
	private RencanaStudi $rencanaStudi;
	
	function __construct()
	{
	}

	function __destruct()
	{
	}



}


?>


