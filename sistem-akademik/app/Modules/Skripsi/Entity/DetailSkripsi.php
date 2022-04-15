<?php 
namespace App\Modules\Skripsi\Entity;

class DetailSkripsi{
	private int $id;
	private string $label;
	private string $komentar;
	private bool $isAccepted;
	private DateTime $tanggalAccepted;

	function __construct()
	{
	}

	function __destruct()
	{
	}

}

?>