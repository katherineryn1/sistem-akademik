<?php
namespace App\Modules\Skripsi\Entity;

use DateTime;
class DetailSkripsi{
	private int $id;
	private string $label;
	private string $komentar;
	private bool $isAccepted;
	private DateTime $tanggalAccepted;

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
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getKomentar(): string
    {
        return $this->komentar;
    }

    /**
     * @param string $komentar
     */
    public function setKomentar(string $komentar): void
    {
        $this->komentar = $komentar;
    }

    /**
     * @return bool
     */
    public function isAccepted(): bool
    {
        return $this->isAccepted;
    }

    /**
     * @param bool $isAccepted
     */
    public function setIsAccepted(bool $isAccepted): void
    {
        $this->isAccepted = $isAccepted;
    }

    /**
     * @return DateTime
     */
    public function getTanggalAccepted(): DateTime
    {
        return $this->tanggalAccepted;
    }

    /**
     * @param DateTime $tanggalAccepted
     */
    public function setTanggalAccepted(DateTime $tanggalAccepted): void
    {
        $this->tanggalAccepted = $tanggalAccepted;
    }



}

?>
