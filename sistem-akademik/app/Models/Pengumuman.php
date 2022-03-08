<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman{

	private $id;
	private $judul;
	private $keterangan;
	private $tanggal;

	function __construct()
	{
	}

	function __destruct()
	{
	}



}
class Pengumuman extends Model
{
    use HasFactory;
}
