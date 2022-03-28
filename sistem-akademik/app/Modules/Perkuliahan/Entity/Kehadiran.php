<?php
namespace App\Modules\Perkuliahan\Entity;

use App\Modules\Pengguna\Entity\Pengguna;

class Kehadiran{
    private int $id = -1 ;
	private string $keterangan = "";
	private Pengguna $pengguna;

	function __construct()
	{
	}

	function __destruct()
	{
	}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getKeterangan(): string
    {
        return $this->keterangan;
    }

    /**
     * @param string $keterangan
     */
    public function setKeterangan(string $keterangan): void
    {
        $this->keterangan = $keterangan;
    }

    /**
     * @return Pengguna
     */
    public function getPengguna(): Pengguna
    {
        return $this->pengguna;
    }

    /**
     * @param Pengguna $pengguna
     */
    public function setPengguna(Pengguna $pengguna): void
    {
        $this->pengguna = $pengguna;
    }

    /**
     * @param string $user
     */
    public function setPenggunaByNomorInduk(string $nomorInduk): void
    {
        $this->pengguna = new Pengguna();
        $this->pengguna->setNomorInduk($nomorInduk);
    }
    public function getArray():array {
        return [
            'id' => $this->getId(),
            'keterangan' => $this->getKeterangan(),
            'pengguna' => $this->getPengguna()->getNomorInduk(),
        ];
    }
}
?>
