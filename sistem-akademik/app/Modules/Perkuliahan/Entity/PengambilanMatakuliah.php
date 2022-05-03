<?php
namespace App\Modules\Perkuliahan\Entity;


use App\Modules\Pengguna\Entity\Pengguna;

class PengambilanMatakuliah{
    private int $id = -1;
    private Pengguna $pengguna;
    private PosisiAmbilPengambilanMatakuliah $posisiAmbil;

    /**
     * PengambilanMatakuliah constructor.
     */
    public function __construct(){
        $this->setPengguna(new Pengguna());
        $this->setPosisiAmbil(new PosisiAmbilPengambilanMatakuliah());
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
     * @return PosisiAmbilPengambilanMatakuliah
     */
    public function getPosisiAmbil(): PosisiAmbilPengambilanMatakuliah
    {
        return $this->posisiAmbil;
    }

    /**
     * @param PosisiAmbilPengambilanMatakuliah $posisiAmbil
     */
    public function setPosisiAmbil(PosisiAmbilPengambilanMatakuliah $posisiAmbil): void
    {
        $this->posisiAmbil = $posisiAmbil;
    }
}
