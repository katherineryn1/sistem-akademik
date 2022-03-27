<?php

namespace App\Models;

use App\Modules\Perkuliahan\Entity\PengambilanMatakuliah;
use App\Modules\Perkuliahan\Persistence\PengambilanMatakuliahPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilanMatakuliahData extends Model implements PengambilanMatakuliahPersistence {
    use HasFactory;

    public function insertSingle(PengambilanMatakuliah $pengambilanMK): bool
    {
        // TODO: Implement insertSingle() method.
    }

    public function updateSingle(PengambilanMatakuliah $pengambilanMK): bool
    {
        // TODO: Implement updateSingle() method.
    }

    public function deleteSingle(int $id): bool
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
