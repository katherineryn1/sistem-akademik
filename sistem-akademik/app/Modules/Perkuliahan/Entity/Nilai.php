<?php
namespace App\Modules\Perkuliahan\Entity;


use App\Modules\Mahasiswa\Entity\Mahasiswa;

class Nilai{
    private int $id;
	private float $nilai1;
	private float $nilai2;
	private float $nilai3;
	private float $nilai4;
	private float $nilai5;
	private float $nilaiUAS;
	private float $nilaiAkhir;
	private string $index;
	private Mahasiswa $mahasiswa;

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
     * @return float
     */
    public function getNilai1(): float
    {
        return $this->nilai1;
    }

    /**
     * @param float $nilai1
     */
    public function setNilai1(float $nilai1): void
    {
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
    public function setNilai2(float $nilai2): void
    {
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
    public function setNilai3(float $nilai3): void
    {
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
    public function setNilai4(float $nilai4): void
    {
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
    public function setNilai5(float $nilai5): void
    {
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
    public function setNilaiUAS(float $nilaiUAS): void
    {
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
    public function setNilaiAkhir(float $nilaiAkhir): void
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
     * @return Mahasiswa
     */
    public function getMahasiswa(): Mahasiswa
    {
        return $this->mahasiswa;
    }

    /**
     * @param Mahasiswa $mahasiswa
     */
    public function setMahasiswa(Mahasiswa $mahasiswa): void
    {
        $this->mahasiswa = $mahasiswa;
    }

    /**
     * @param string $nomorInduk
     */
    public function setMahasiswaByNomorInduk(Mahasiswa $nomorInduk): void
    {
        $this->mahasiswa = new Mahasiswa();
        $this->mahasiswa->setNomorInduk($nomorInduk);
    }

	/**
	 *
	 * @param bobot1
	 * @param bobot2
	 * @param bobot3
	 * @param bobot4
	 * @param bobot5
	 * @param bobotUAS
	 */
	public function hitungNA(int $bobot1, int $bobot2, int $bobot3, int $bobot4, int $bobot5, int $bobotUAS)
	{
	}

	public function konvertNAkeIndex()
	{
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
            'nomor_induk' => $this->getMahasiswa()
        ];
    }

}
?>


