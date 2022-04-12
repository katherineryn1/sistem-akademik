<?php
namespace App\Modules\Perkuliahan\Entity;

use DateTime;
class Roster{
    private int $id = -1;
	private DateTime $tanggal;
	private string $jamMulai = "";
	private string $jamSelesai = "";
	private string  $ruangan = "";
	private array $kehadiran =[];

	function __construct(){
	    $this->setTanggal(new DateTime());
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
     * @return DateTime
     */
    public function getTanggal(): DateTime
    {
        return $this->tanggal;
    }

    /**
     * @param DateTime $tanggal
     */
    public function setTanggal(DateTime $tanggal): void
    {
        $this->tanggal = $tanggal;
    }

    /**
     * @return string
     */
    public function getJamMulai(): string
    {
        return $this->jamMulai;
    }

    /**
     * @param string $jamMulai
     */
    public function setJamMulai(string $jamMulai): void
    {
        $this->jamMulai = $jamMulai;
    }

    /**
     * @return string
     */
    public function getJamSelesai(): string
    {
        return $this->jamSelesai;
    }

    /**
     * @param string $jamSelesai
     */
    public function setJamSelesai(string $jamSelesai): void
    {
        $this->jamSelesai = $jamSelesai;
    }

    /**
     * @return string
     */
    public function getRuangan(): string
    {
        return $this->ruangan;
    }

    /**
     * @param string $ruangan
     */
    public function setRuangan(string $ruangan): void
    {
        $this->ruangan = $ruangan;
    }

    /**
     * @return array
     */
    public function getKehadiran(): array
    {
        return $this->kehadiran;
    }

    /**
     * @param array $kehadiran
     */
    public function setKehadiran(array $kehadiran): void
    {
        $this->kehadiran = $kehadiran;
    }

    public function getArray():array {
        return [
            'id' => $this->getId(),
            'tanggal' => $this->getTanggal(),
            'jam_mulai' => $this->getJamMulai(),
            'jam_selesai' => $this->getJamSelesai(),
            'ruangan' => $this->getRuangan(),
            'kehadiran' => $this->getKehadiran(),
        ];
    }

}
?>
