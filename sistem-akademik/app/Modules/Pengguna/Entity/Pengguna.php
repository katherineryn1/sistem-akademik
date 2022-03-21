<?php
namespace App\Modules\Pengguna\Entity;

use DateTime;

class Pengguna {
    private string $nomorInduk;
	private string $nama;
	private DateTime $tanggalLahir;
	private string $tempatLahir;
	private string $jenisKelamin;
	private string $alamat;
	private string $notelepon;
	private string $password;
	private string $email;
	private string $fotoprofil;
	private string $jabatan;

	function __construct(){
	}

	function __destruct(){
	}

    /**
     * @return string
     */
    public function getNomorInduk(): string
    {
        return $this->nomorInduk;
    }

    /**
     * @return string
     */
    public function getNama(): string
    {
        return $this->nama;
    }

    /**
     * @return DateTime
     */
    public function getTanggalLahir(): DateTime
    {
        return $this->tanggalLahir;
    }

    /**
     * @return string
     */
    public function getTempatLahir(): string
    {
        return $this->tempatLahir;
    }

    /**
     * @return string
     */
    public function getJenisKelamin(): string
    {
        return $this->jenisKelamin;
    }

    /**
     * @return string
     */
    public function getAlamat(): string
    {
        return $this->alamat;
    }

    /**
     * @return string
     */
    public function getNotelepon(): string
    {
        return $this->notelepon;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFotoprofil(): string
    {
        return $this->fotoprofil;
    }

    /**
     * @return string
     */
    public function getJabatan(): string
    {
        return $this->jabatan;
    }

    /**
     * @param string $nomorInduk
     */
    public function setNomorInduk(string $nomorInduk): void
    {
        $this->nomorInduk = $nomorInduk;
    }

    /**
     * @param string $nama
     */
    public function setNama(string $nama): void
    {
        $this->nama = $nama;
    }

    /**
     * @param DateTime $tanggalLahir
     */
    public function setTanggalLahir(DateTime $tanggalLahir): void
    {
        $this->tanggalLahir = $tanggalLahir;
    }

    /**
     * @param string $tempatLahir
     */
    public function setTempatLahir(string $tempatLahir): void
    {
        $this->tempatLahir = $tempatLahir;
    }

    /**
     * @param string $jenisKelamin
     */
    public function setJenisKelamin(string $jenisKelamin): void
    {
        $this->jenisKelamin = $jenisKelamin;
    }

    /**
     * @param string $alamat
     */
    public function setAlamat(string $alamat): void
    {
        $this->alamat = $alamat;
    }

    /**
     * @param string $notelepon
     */
    public function setNotelepon(string $notelepon): void
    {
        $this->notelepon = $notelepon;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $fotoprofil
     */
    public function setFotoprofil(string $fotoprofil): void
    {
        $this->fotoprofil = $fotoprofil;
    }

    /**
    * @param string $jabatan
    */
    public function setJabatan(string $jabatan): void
    {
        $this->jabatan = $jabatan;
    }
}
?>
