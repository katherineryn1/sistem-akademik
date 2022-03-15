<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaStudi{
	private $id;
	private $semester;
	private $tahun;
	public $m_Pengambilan;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function hitungIPS()
	{
	}

}


class RencanaStudi extends Model
{
    use HasFactory;
}
