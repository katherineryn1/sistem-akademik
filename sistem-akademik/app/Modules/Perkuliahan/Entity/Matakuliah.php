<?php
namespace App\Modules\Perkuliahan\Entity;

class Matakuliah{
	private string $kode = "";
	private string $nama  = "";
	private JenisMatakuliah $jenis ;
	private SifatMatakuliah $sifat ;
	private int $sks  = -1;

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
     * @return JenisMatakuliah
     */
    public function getJenis(): JenisMatakuliah
    {
        return $this->jenis;
    }

    /**
     * @return SifatMatakuliah
     */
    public function getSifat(): SifatMatakuliah
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
     * @param JenisMatakuliah $jenis
     */
    public function setJenis(JenisMatakuliah $jenis): void
    {
        $this->jenis = $jenis;
    }

    /**
     * @param SifatMatakuliah $sifat
     */
    public function setSifat(SifatMatakuliah $sifat): void
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
