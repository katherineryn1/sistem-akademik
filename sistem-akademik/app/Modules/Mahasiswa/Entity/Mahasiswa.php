<?php
namespace App\Modules\Mahasiswa\Entity;


use App\Modules\Pengguna\Entity\Pengguna;

class Mahasiswa extends Pengguna {
	private string $jurusan = "";
	private int $tahunMasuk = 0;
	private int $tahunLulus = 0;

	function __construct(){
        parent::__construct();
	}

	function __destruct()
	{
	}

    /**
     * @return string
     */
    public function getJurusan(): string
    {
        return $this->jurusan;
    }

    /**
     * @return int
     */
    public function getTahunMasuk(): int
    {
        return $this->tahunMasuk;
    }

    /**
     * @return int
     */
    public function getTahunLulus(): int
    {
        return $this->tahunLulus;
    }

    /**
     * @param string $jurusan
     */
    public function setJurusan(string $jurusan): void
    {
        $this->jurusan = $jurusan;
    }

    /**
     * @param int $tahunMasuk
     */
    public function setTahunMasuk(int $tahunMasuk): void
    {
        $this->tahunMasuk = $tahunMasuk;
    }

    /**
     * @param int $tahunLulus
     */
    public function setTahunLulus(int $tahunLulus): void
    {
        $this->tahunLulus = $tahunLulus;
    }

}


?>


