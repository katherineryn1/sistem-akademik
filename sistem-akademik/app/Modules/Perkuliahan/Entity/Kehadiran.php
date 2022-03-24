<?php
namespace App\Modules\Perkuliahan\Entity;

use App\Entity\User;

class Kehadiran{
	private string $keterangan;
	public User $user;

	function __construct()
	{
	}

	function __destruct()
	{
	}

}



?>
