<?php
namespace App\Modules\Dosen\Entity;

use App\Entity\User;
use App\Modules\Pengguna\Entity\Pengguna;

class Dosen extends Pengguna {
	private string $programStudi = "";
	private string $bidangIlmu = "";
	private string $gelarAkademik = "";
	private StatusIkatanKerja $statusIkatanKerja;
	private StatusDosen $statusDosen;

	function __construct(){
	    parent::__construct();
	    $this->setStatusIkatanKerja(new StatusIkatanKerja());
	    $this->setStatusDosen(new StatusDosen());
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
     * @return StatusIkatanKerja
     */
    public function getStatusIkatanKerja(): StatusIkatanKerja
    {
        return $this->statusIkatanKerja;
    }

    /**
     * @return StatusDosen
     */
    public function  getStatusDosen(): StatusDosen {
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
     * @param StatusIkatanKerja $statusIkatanKerja
     */
    public function setStatusIkatanKerja(StatusIkatanKerja $statusIkatanKerja): void
    {
        $this->statusIkatanKerja = $statusIkatanKerja;
    }

    /**
     * @param StatusDosen $statusDosen
     */
    public function setStatusDosen(StatusDosen $statusDosen): void
    {
        $this->statusDosen = $statusDosen;
    }
}
?>
