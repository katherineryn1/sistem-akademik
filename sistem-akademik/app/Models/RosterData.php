<?php

namespace App\Models;

use App\Modules\Perkuliahan\Entity\Roster;
use App\Modules\Perkuliahan\Persistence\RosterPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RosterData extends Model implements RosterPersistence {
    use HasFactory;

    public function insertSingle(Roster $roster): bool
    {
        // TODO: Implement insertSingle() method.
    }

    public function updateSingle(Roster $roster): bool
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
