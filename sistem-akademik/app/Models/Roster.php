<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RosterEntity{

	private $tanggal;
	private $jamMulai;
	private $jamSelesai;
	private $ruangan;
	public $m_Kehadiran;

	function __construct()
	{
	}

	function __destruct()
	{
	}



}

class Roster extends Model
{
    use HasFactory;
}
