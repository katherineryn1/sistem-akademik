<?php
namespace App\Modules\Perkuliahan\Entity;

use App\Modules\Pengguna\Entity\Pengguna;

class Kehadiran{
    private int $id = -1 ;
	private string $keterangan = "";
	private PengambilanMatakuliah $pengguna;

	function __construct(){
	    $this->setPengguna(new PengambilanMatakuliah());
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
     * @return PengambilanMatakuliah
     */
    public function getPengguna(): PengambilanMatakuliah
    {
        return $this->pengguna;
    }

    /**
     * @param PengambilanMatakuliah $pengguna
     */
    public function setPengguna(PengambilanMatakuliah $pengguna): void
    {
        $this->pengguna = $pengguna;
    }



    public function getArray():array {
        return [
            'id' => $this->getId(),
            'keterangan' => $this->getKeterangan(),
            'id_pengambilan_matakuliah' => $this->getPengguna()->getId(),
        ];
    }
}
?>
