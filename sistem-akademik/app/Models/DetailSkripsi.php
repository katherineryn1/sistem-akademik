<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSkripsiEntity {

	private $id;
	private $label;
	private $komentar;
	private $isAccepted;
	private $tanggalAccepted;

	function __construct()
	{
	}

	function __destruct()
	{
	}



}
class DetailSkripsi extends Model
{
    use HasFactory;
}
