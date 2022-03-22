<?php
namespace App\Modules\Pengumuman\Entity;

use DateTime;
class Pengumuman{

	private int $id;
	private string $judul;
	private string $keterangan;
	private DateTime $tanggal;

	function __construct(){
	    $this->id = 0;
        $this->judul = "";
        $this->keterangan = "";
        $this->tanggal = new DateTime();
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
     * @return string
     */
    public function getKeterangan(): string
    {
        return $this->keterangan;
    }

    /**
     * @return string
     */
    public function getJudul(): string
    {
        return $this->judul;
    }

    /**
     * @return DateTime
     */
    public function getTanggal(): DateTime
    {
        return $this->tanggal;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $judul
     */
    public function setJudul(string $judul): void
    {
        $this->judul = $judul;
    }

    /**
     * @param string $keterangan
     */
    public function setKeterangan(string $keterangan): void
    {
        $this->keterangan = $keterangan;
    }

    /**
     * @param DateTime $tanggal
     */
    public function setTanggal(DateTime $tanggal): void
    {
        $this->tanggal = $tanggal;
    }


    public function getArray():array {
        return [
            'id' => $this->getId(),
            'judul' => $this->getJudul(),
            'keterangan' => $this->getKeterangan(),
            'tanggal' => $this->getTanggal(),
        ];
    }
}
?>


