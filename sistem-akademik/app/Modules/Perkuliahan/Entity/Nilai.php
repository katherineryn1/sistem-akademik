<?php
namespace App\Modules\Perkuliahan\Entity;


use App\Modules\Mahasiswa\Entity\Mahasiswa;

class Nilai{
    private int $id = -1;
	private float $nilai1 = 0;
	private float $nilai2 = 0;
	private float $nilai3 = 0;
	private float $nilai4 = 0;
	private float $nilai5 = 0;
	private float $nilaiUAS = 0;
	private float $nilaiAkhir = 0;
	private string $index = "";
	private PengambilanMatakuliah $pengambilanMatakuliah;

	function __construct(){
	    $this->setPengambilanMatakuliah(new PengambilanMatakuliah());
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
     * @return float
     */
    public function getNilai1(): float
    {
        return $this->nilai1;
    }

    /**
     * @param float $nilai1
     */
    public function setNilai1(?float $nilai1): void
    {
        if($nilai1 == null){
            $nilai1 = 0;
        }
        $this->nilai1 = $nilai1;
    }

    /**
     * @return float
     */
    public function getNilai2(): float
    {
        return $this->nilai2;
    }

    /**
     * @param float $nilai2
     */
    public function setNilai2(?float $nilai2): void
    {
        if($nilai2 == null){
            $nilai2 = 0;
        }
        $this->nilai2 = $nilai2;
    }

    /**
     * @return float
     */
    public function getNilai3(): float
    {
        return $this->nilai3;
    }

    /**
     * @param float $nilai3
     */
    public function setNilai3(?float $nilai3): void
    {
        if($nilai3 == null){
            $nilai3 = 0;
        }
        $this->nilai3 = $nilai3;
    }

    /**
     * @return float
     */
    public function getNilai4(): float
    {
        return $this->nilai4;
    }

    /**
     * @param float $nilai4
     */
    public function setNilai4(?float $nilai4): void
    {
        if($nilai4 == null){
            $nilai4 = 0;
        }
        $this->nilai4 = $nilai4;
    }

    /**
     * @return float
     */
    public function getNilai5(): float
    {
        return $this->nilai5;
    }

    /**
     * @param float $nilai5
     */
    public function setNilai5(?float $nilai5): void
    {
        if($nilai5 == null){
            $nilai5 = 0;
        }
        $this->nilai5 = $nilai5;
    }

    /**
     * @return float
     */
    public function getNilaiUAS(): float
    {
        return $this->nilaiUAS;
    }

    /**
     * @param float $nilaiUAS
     */
    public function setNilaiUAS(?float $nilaiUAS): void
    {
        if($nilaiUAS == null){
            $nilaiUAS = 0;
        }
        $this->nilaiUAS = $nilaiUAS;
    }

    /**
     * @return float
     */
    public function getNilaiAkhir(): float
    {
        return $this->nilaiAkhir;
    }

    /**
     * @param float $nilaiAkhir
     */
    public function setNilaiAkhir(?float $nilaiAkhir): void
    {
        $this->nilaiAkhir = $nilaiAkhir;
    }

    /**
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * @param string $index
     */
    public function setIndex(string $index): void
    {
        $this->index = $index;
    }

    /**
     * @return PengambilanMatakuliah
     */
    public function getPengambilanMatakuliah(): PengambilanMatakuliah
    {
        return $this->pengambilanMatakuliah;
    }

    /**
     * @param PengambilanMatakuliah $pengambilanMatakuliah
     */
    public function setPengambilanMatakuliah(PengambilanMatakuliah $pengambilanMatakuliah): void
    {
        $this->pengambilanMatakuliah = $pengambilanMatakuliah;
    }


    /**
     *
     * @param int $bobot1
     * @param int $bobot2
     * @param int $bobot3
     * @param int $bobot4
     * @param int $bobot5
     * @param int $bobotUAS
     */
	public function hitungNA(int $bobot1, int $bobot2, int $bobot3, int $bobot4, int $bobot5, int $bobotUAS) :void{

	}

	public function konvertNAkeIndex()	{
	}

    public function getArray():array {
        return [
            'id' => $this->getId(),
            'nilai_1' => $this->getNilai1(),
            'nilai_2' => $this->getNilai2(),
            'nilai_3' => $this->getNilai3(),
            'nilai_4' => $this->getNilai4(),
            'nilai_5' => $this->getNilai5(),
            'nilai_UAS' => $this->getNilaiUAS(),
            'nilai_akhir' => $this->getNilaiAkhir(),
            'index' => $this->getIndex(),
            'pengambilan_matakuliah' => $this->getPengambilanMatakuliah()->getId(),
        ];
    }

}
?>
