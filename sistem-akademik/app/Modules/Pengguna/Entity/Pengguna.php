<?php
namespace App\Modules\Pengguna\Entity;

use DateTime;

class Pengguna {
    private string $nomorInduk = "";
	private string $nama = "";
	private DateTime $tanggalLahir;
	private string $tempatLahir = "";
	private JenisKelamin $jenisKelamin;
	private string $alamat = "";
	private string $notelepon = "";
	private string $password = "";
	private string $email = "";
	private string $fotoprofil = "";
	private Jabatan $jabatan;

	function __construct(){
	    $this->setTanggalLahir(new DateTime());
	    $this->setJabatan(new Jabatan());
	    $this->setJenisKelamin(new JenisKelamin());
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
     * @return JenisKelamin
     */
    public function getJenisKelamin(): JenisKelamin
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
     * @return Jabatan
     */
    public function getJabatan(): Jabatan
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
     * @param JenisKelamin $jenisKelamin
     */
    public function setJenisKelamin(JenisKelamin $jenisKelamin): void
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
     * @param string $password
     */
    public function setHashPassword(string $password): void
    {
       $this->password =  password_hash($password, PASSWORD_DEFAULT);;
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
    public function setFotoprofil(?string $fotoprofil): void
    {
        if($fotoprofil == null){
            $this->fotoprofil = "";
            return;
        }
        $this->fotoprofil = $fotoprofil;
    }

    /**
     * @param Jabatan $jabatan
     */
    public function setJabatan(Jabatan $jabatan): void
    {
        $this->jabatan = $jabatan;
    }
}
?>
