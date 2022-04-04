<?php
namespace App\Modules\Perkuliahan\Entity;

use App\Modules\Perkuliahan;
use App\Modules\Dosen\Entity\Dosen;


class Kurikulum{
	private int $id = -1;
	private int $tahun = 0;
	private string $semester = "" ;
	private string $kelas = "";
	private int $jumlahPertemuan = 0;
	private Matakuliah $matakuliah ;
    private array $nilai = [];
	private array $roster = [];
	private array $pengambilanMatakuliah = [];

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
     * @return int
     */
    public function getTahun(): int
    {
        return $this->tahun;
    }

    /**
     * @param int $tahun
     */
    public function setTahun(int $tahun): void
    {
        $this->tahun = $tahun;
    }

    /**
     * @return string
     */
    public function getSemester(): string
    {
        return $this->semester;
    }

    /**
     * @param string $semester
     */
    public function setSemester(string $semester): void
    {
        $this->semester = $semester;
    }

    /**
     * @return string
     */
    public function getKelas(): string
    {
        return $this->kelas;
    }

    /**
     * @param string $kelas
     */
    public function setKelas(string $kelas): void
    {
        $this->kelas = $kelas;
    }

    /**
     * @return int
     */
    public function getJumlahPertemuan(): int
    {
        return $this->jumlahPertemuan;
    }

    /**
     * @param int $jumlahPertemuan
     */
    public function setJumlahPertemuan(int $jumlahPertemuan): void
    {
        $this->jumlahPertemuan = $jumlahPertemuan;
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
     * @param string kodeMatakuliah
     */
    public function setMatakuliahByKode(string $kodeMatakuliah): void
    {
        $this->matakuliah = new Matakuliah();
        $this->matakuliah->setKode($kodeMatakuliah);
    }

    /**
     * @return array
     */
    public function getNilai(): array
    {
        return $this->nilai;
    }

    /**
     * @param array $nilai
     */
    public function setNilai(array $nilai): void
    {
        $this->nilai = $nilai;
    }

    /**
     * @return array
     */
    public function getRoster(): array
    {
        return $this->roster;
    }

    /**
     * @param array $roster
     */
    public function setRoster(array $roster): void
    {
        $this->roster = $roster;
    }

    /**
     * @return array
     */
    public function getPengambilanMatakuliah(): array
    {
        return $this->pengambilanMatakuliah;
    }

    /**
     * @param array $pengambilanMatakuliah
     */
    public function setPengambilanMatakuliah(array $pengambilanMatakuliah): void
    {
        $this->pengambilanMatakuliah = $pengambilanMatakuliah;
    }


	public function hitungKehadiran(){
	}

    public function getArray():array {
        return [
            'id' => $this->getId(),
            'tahun' => $this->getTahun(),
            'semester' => $this->getSemester(),
            'kelas' => $this->getKelas(),
            'jumlah_pertemuan' => $this->getJumlahPertemuan(),
            'kode_matakuliah' => ($this->getMatakuliah())->getKode(),
        ];
    }
}
?>
