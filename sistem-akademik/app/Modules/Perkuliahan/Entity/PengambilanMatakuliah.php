<?php
namespace App\Modules\Perkuliahan\Entity;


use App\Modules\Pengguna\Entity\Pengguna;

class PengambilanMatakuliah{
    private int $id = -1;
    private Pengguna $pengguna;
    private string $posisiAmbil = "";

    /**
     * PengambilanMatakuliah constructor.
     * @param int $id
     */
    public function __construct()
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
     * @return string
     */
    public function getPosisiAmbil(): string
    {
        return $this->posisiAmbil;
    }

    /**
     * @param string $posisiAmbil
     */
    public function setPosisiAmbil(string $posisiAmbil): void
    {
        $this->posisiAmbil = $posisiAmbil;
    }

    public function getArray():array {
        return [
            'id' => $this->getId(),
            'nomor_induk' => $this->getPengguna()->getNomorInduk(),
            'posisi_ambil' => $this->getPosisiAmbil(),
        ];
    }


}
