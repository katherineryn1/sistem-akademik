<?php

namespace App\Models;

use App\Modules\Perkuliahan\Entity\Nilai;
use App\Modules\Perkuliahan\Persistence\NilaiPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiData extends Model implements NilaiPersistence{
    use HasFactory;

    public function insertSingle(Nilai $nilai): bool
    {
        // TODO: Implement insertSingle() method.
    }

    public function updateSingle(Nilai $nilai): bool
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
