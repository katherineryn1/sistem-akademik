<?php 
namespace App\Entity;

class User {
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

}

?>