<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah{

	private $kode;
	private $nama;
	private $jenis;
	private $sifat;
	private $sks;

	function __construct()
	{
	}

	function __destruct()
	{
	}



}
class Matakuliah extends Model
{
    use HasFactory;
}
