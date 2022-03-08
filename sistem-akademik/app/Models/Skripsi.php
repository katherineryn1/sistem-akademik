<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkripsiEntity{

	private $id;
	private $judul;
	private $batasAkhir;
	private $file;
	private $isTugasAkhir;
	private $milestone;
	public $m_User;
	public $m_Detail;
	

	function __construct()
	{
	}

	function __destruct()
	{
	}



}
class Skripsi extends Model
{
    use HasFactory;
}
