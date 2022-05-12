<?php
namespace App\Modules\Skripsi\Entity;

use App\Modules\Perkuliahan\Entity\Matakuliah;

class Skripsi
{
    private int $id = 1;
    private string $judul = "";
    private string $batasAkhir = "";
    private string $file = "";
    private bool $isTugasAkhir;
    private int $milestone = 0;
    private Matakuliah $matakuliah;
    private array $detail;

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
    public function getJudul(): string
    {
        return $this->judul;
    }

    /**
     * @param string $judul
     */
    public function setJudul(string $judul): void
    {
        $this->judul = $judul;
    }

    /**
     * @return string
     */
    public function getBatasAkhir(): string
    {
        return $this->batasAkhir;
    }

    /**
     * @param string $batasAkhir
     */
    public function setBatasAkhir(string $batasAkhir): void
    {
        $this->batasAkhir = $batasAkhir;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile(string $file): void
    {
        $this->file = $file;
    }

    /**
     * @return bool
     */
    public function isTugasAkhir(): bool
    {
        return $this->isTugasAkhir;
    }

    /**
     * @param bool $isTugasAkhir
     */
    public function setIsTugasAkhir(bool $isTugasAkhir): void
    {
        $this->isTugasAkhir = $isTugasAkhir;
    }

    /**
     * @return int
     */
    public function getMilestone(): int
    {
        return $this->milestone;
    }

    /**
     * @param int $milestone
     */
    public function setMilestone(int $milestone): void
    {
        $this->milestone = $milestone;
    }

    /**
     * @return Matakuliah
     */
    public function getMatakuliah(): Matakuliah
    {
        return $this->matakuliah;
    }

    /**
     * @param Matakuliah $matakuliah
     */
    public function setMatakuliah(Matakuliah $matakuliah): void
    {
        $this->matakuliah = $matakuliah;
    }

    /**
     * @return array
     */
    public function getDetail(): array
    {
        return $this->detail;
    }

    /**
     * @param array $detail
     */
    public function setDetail(array $detail): void
    {
        $this->detail = $detail;
    }

}
?>
