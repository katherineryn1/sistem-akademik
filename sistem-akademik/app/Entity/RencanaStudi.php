<?php
namespace App\Entity;

use App\Entity\PengambilanMatakuliah;

class RencanaStudi{
	private int $id;
	private string $semester;
	private int $tahun;
	public PengambilanMatakuliah $pengambilanaMatakuliah;

	function __construct()
	{
	}

	function __destruct()
	{
	}

	public function hitungIPS(){
	}

}



?>