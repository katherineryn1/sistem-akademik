<?php
namespace App\Modules\Perkuliahan\Entity;

class Matakuliah{
	private string $kode;
	private string $nama;
	private string $jenis;
	private string $sifat;
	private int $sks;

	function __construct()
	{
	}

	function __destruct()
	{
	}

    /**
     * @return string
     */
    public function getNama(): string
    {
        return $this->nama;
    }


    /**
     * @return string
     */
    public function getKode(): string
    {
        return $this->kode;
    }


    /**
     * @return string
     */
    public function getJenis(): string
    {
        return $this->jenis;
    }

    /**
     * @return string
     */
    public function getSifat(): string
    {
        return $this->sifat;
    }

    /**
     * @return int
     */
    public function getSks(): int
    {
        return $this->sks;
    }

    /**
     * @param string $nama
     */
    public function setNama(string $nama): void
    {
        $this->nama = $nama;
    }

    /**
     * @param string $kode
     */
    public function setKode(string $kode): void
    {
        $this->kode = $kode;
    }

    /**
     * @param string $jenis
     */
    public function setJenis(string $jenis): void
    {
        $this->jenis = $jenis;
    }

    /**
     * @param string $sifat
     */
    public function setSifat(string $sifat): void
    {
        $this->sifat = $sifat;
    }

    /**
     * @param int $sks
     */
    public function setSks(int $sks): void
    {
        $this->sks = $sks;
    }

    public function getArray():array {
        return [
            'kode' => $this->getKode(),
            'nama' => $this->getNama(),
            'jenis' => $this->getJenis(),
            'sifat' => $this->getSifat(),
            'sks' => $this->getSks(),
        ];
    }

}



?>


