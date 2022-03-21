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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function insert(Pengguna $pengguna): bool
    {
        // TODO: Implement insert() method.
    }
    public function update(Pengguna $pengguna): bool
    {
        // TODO: Implement insert() method.
    }
    public function delete(Pengguna $pengguna): bool
    {
        // TODO: Implement insert() method.
    }
    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }

    public function getByAttribute(): array
    {
        // TODO: Implement getByAttribute() method.
    }
}
