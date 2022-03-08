<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenEntity extends User
{

	private $programStudi;
	private $bidangIlmu;
	private $gelarAkademik;
	private $statusIkatanKerja;
	private $statusDosen;

	function __construct()
	{
	}

	function __destruct()
	{
	}

}

class Dosen extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dosen';

   


}
