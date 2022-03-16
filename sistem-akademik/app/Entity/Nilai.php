<?php
namespace App\Entity;

use App\Entity\Mahasiswa;

class Nilai{

	private float $nilai1;
	private float $nilai2;
	private float $nilai3;
	private float $nilai4;
	private float $nilai5;
	private float $nilaiUAS;
	private float $nilaiAkhir;
	private string $index;
	private Mahasiswa $mahasiswa;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	/**
	 * 
	 * @param bobot1
	 * @param bobot2
	 * @param bobot3
	 * @param bobot4
	 * @param bobot5
	 * @param bobotUAS
	 */
	public function hitungNA(int $bobot1, int $bobot2, int $bobot3, int $bobot4, int $bobot5, int $bobotUAS)
	{
	}

	public function konvertNAkeIndex()
	{
	}

}




?>


