<?php
namespace App\Entity;

class Nilai{

	private $nilai1;
	private $nilai2;
	private $nilai3;
	private $nilai4;
	private $nilai5;
	private $nilaiUAS;
	private $nilaiAkhir;
	private $index;
	public $m_Mahasiswa;

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


