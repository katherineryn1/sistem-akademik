<?php

namespace App\Models;

use App\Modules\Perkuliahan\Entity\Kehadiran;
use App\Modules\Perkuliahan\Persistence\KehadiranPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranData extends Model implements KehadiranPersistence{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keterangan',
        'pengguna',
        'id_roster',
    ];

    public function insertSingle(Kehadiran $kehadiran): bool
    {
        // TODO: Implement insertSingle() method.
    }

    public function updateSingle(Kehadiran $kehadiran): bool
    {
        // TODO: Implement updateSingle() method.
    }

    public function deleteSingle(string $id): bool
    {
        // TODO: Implement deleteSingle() method.
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }

    public function getByAttribute(array $attribute, array $value, array $logic): array
    {
        // TODO: Implement getByAttribute() method.
    }
}
