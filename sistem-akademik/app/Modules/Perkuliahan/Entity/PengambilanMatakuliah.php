<?php
namespace App\Modules\Perkuliahan\Entity;

use App\Modules\Perkuliahan;
use App\Modules\Dosen\Entity;


class PengambilanMatakuliah{
	private int $id;
	private int $tahun;
	private string $semester;
	private string $kelas;
	private int $jumlahPertemuan;
	private Matakuliah $matakuliah;
	private array $nilai;
	private array $roster;
	private Dosen $dosen;
	private array $mahasiswa;

	function __construct()
	{
	}

	function __destruct()
	{
	}

	public function hitungKehadiran(){
	}

    public function getArray():array {
        return [
            'id' => $this->getKode(),
            'tahun' => $this->getNama(),
            'semester' => $this->getJenis(),
            'kelas' => $this->getSifat(),
            'jumlah_pertemuan' => $this->getSifat(),
            'matakuliah' => $this->getSifat(),
            'dosen' => $this->getSifat(),
            'nilai' => $this->getSifat(),
            'roster' => $this->getSifat(),
            'mahasiswa' => $this->getSifat(),
        ];
    }
}
?>
