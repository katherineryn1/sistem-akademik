<?php
namespace App\Entity;

use App\Entity\User;

class Dosen extends User{
	private string $programStudi;
	private string $bidangIlmu;
	private string $gelarAkademik;
	private string $statusIkatanKerja;
	private bool $statusDosen;

	function __construct()
	{
	}

	function __destruct()
	{
	}

}


?>