<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranSkripsi{

	private $keterangan;
	public $m_User;

	function __construct()
	{
	}

	function __destruct()
	{
	}

}

class Kehadiran extends Model{
    use HasFactory;
}
