<?php
namespace App\Modules\Dosen\Entity;

use App\Entity\User;
use App\Modules\Pengguna\Entity\Pengguna;

class Dosen extends Pengguna {
	private string $programStudi;
	private string $bidangIlmu;
	private string $gelarAkademik;
	private string $statusIkatanKerja;
	private bool $statusDosen;

	function __construct()
	{
	}

	function __destruct()
	{
	}

    /**
     * @return string
     */
    public function getProgramStudi(): string
    {
        return $this->programStudi;
    }

    /**
     * @return string
     */
    public function getBidangIlmu(): string
    {
        return $this->bidangIlmu;
    }

    /**
     * @return string
     */
    public function getGelarAkademik(): string
    {
        return $this->gelarAkademik;
    }

    /**
     * @return string
     */
    public function getStatusIkatanKerja(): string
    {
        return $this->statusIkatanKerja;
    }

    /**
     * @return string
     */
    public function  getStatusDosen(): bool {
        return  $this->statusDosen;
    }

    /**
     * @param string $programStudi
     */
    public function setProgramStudi(string $programStudi): void
    {
        $this->programStudi = $programStudi;
    }

    /**
     * @param string $bidangIlmu
     */
    public function setBidangIlmu(string $bidangIlmu): void
    {
        $this->bidangIlmu = $bidangIlmu;
    }

    /**
     * @param string $gelarAkademik
     */
    public function setGelarAkademik(string $gelarAkademik): void
    {
        $this->gelarAkademik = $gelarAkademik;
    }

    /**
     * @param string $statusIkatanKerja
     */
    public function setStatusIkatanKerja(string $statusIkatanKerja): void
    {
        $this->statusIkatanKerja = $statusIkatanKerja;
    }

    /**
     * @param bool $statusDosen
     */
    public function setStatusDosen(bool $statusDosen): void
    {
        $this->statusDosen = $statusDosen;
    }
    public function getArray():array {
        return [
            'nomorInduk' => $this->getNomorInduk(),
            'nama' => $this->getNama(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'tanggalLahir' => $this->getTanggalLahir(),
            'tempatLahir' => $this->getTempatLahir(),
            'jenisKelamin' => $this->getJenisKelamin(),
            'alamat' =>  $this->getAlamat(),
            'notelepon' =>  $this->getNotelepon(),
            'fotoprofile' => "contoh foto",
            'jabatan' => $this->getJabatan(),
            'dosen' => [
                'programStudi' => $this->programStudi,
                'bidangIlmu' => $this->bidangIlmu,
                'gelarAkademik' => $this->gelarAkademik,
                'ikatanKerja' => $this->statusIkatanKerja,
                'statusDosen' => $this->statusDosen,
            ]
        ];
    }
}


?>
