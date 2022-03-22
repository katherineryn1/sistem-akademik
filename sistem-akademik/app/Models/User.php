<?php

namespace App\Models;

use App\Modules\Pengguna\Entity\Pengguna;
use App\Modules\Pengguna\Persistence\PenggunaPersistence;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements PenggunaPersistence{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'nomor_induk';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomor_induk',
        'name',
        'email',
        'password',
        'tanggal_lahir',
        'tempat_lahir' ,
        'jenis_kelamin',
        'alamat',
        'notelepon',
        'fotoprofile',
        'jabatan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }

    public function getByAttribute(): array
    {
        // TODO: Implement getByAttribute() method.
    }

    public function insertSingle(Pengguna $pengguna): bool
    {
        $hasil = $this->fill([
            'nomor_induk' => $pengguna->getNomorInduk(),
            'name' => $pengguna->getNama(),
            'email' => $pengguna->getEmail(),
            'password' => $pengguna->getPassword(),
            'tanggal_lahir' => $pengguna->getTanggalLahir(),
            'tempat_lahir' => $pengguna->getTempatLahir(),
            'jenis_kelamin' => $pengguna->getJenisKelamin(),
            'alamat' =>  $pengguna->getAlamat(),
            'notelepon' =>  $pengguna->getNotelepon(),
            'fotoprofile' => "contoh foto",
            'jabatan' => $pengguna->getJabatan(),
        ]);
        $issaved = $hasil->save();
        echo "hallo dari userr" , $hasil , "--", $issaved;
        return true;
    }

    public function updateSingle(Pengguna $pengguna): bool
    {
        // TODO: Implement updateSingle() method.
    }

    public function deleteSingle(Pengguna $pengguna): bool
    {
        // TODO: Implement deleteSingle() method.
    }
}
