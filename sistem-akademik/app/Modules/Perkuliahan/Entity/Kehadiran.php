<?php
namespace App\Modules\Perkuliahan\Entity;

class Kehadiran{
    private int $id = -1 ;
	private KeteranganKehadiran $keterangan;
	private PengambilanMatakuliah $pengguna;

	function __construct(){
	    $this->setPengguna(new PengambilanMatakuliah());
        $this->setKeterangan(new KeteranganKehadiran());
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
     * @return KeteranganKehadiran
     */
    public function getKeterangan(): KeteranganKehadiran
    {
        return $this->keterangan;
    }

    /**
     * @param KeteranganKehadiran $keterangan
     */
    public function setKeterangan(KeteranganKehadiran $keterangan): void
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

}
?>
