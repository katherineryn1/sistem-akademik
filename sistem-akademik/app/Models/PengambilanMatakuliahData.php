<?php

namespace App\Models;

use App\Modules\Perkuliahan\Entity\Kurikulum;
use App\Modules\Perkuliahan\Entity\PengambilanMatakuliah;
use App\Modules\Perkuliahan\Persistence\PengambilanMatakuliahPersistence;
use App\Modules\Perkuliahan\Persistence\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilanMatakuliahData extends Model implements PengambilanMatakuliahPersistence {
    use HasFactory;

    public function insertUserKurikulum(User $nomorInduk, Kurikulum $kurikulum): bool
    {
        // TODO: Implement insertUserKurikulum() method.
    }

    public function deleteUserKurikulum(User $nomorInduk, Kurikulum $kurikulum): bool
    {
        // TODO: Implement deleteUserKurikulum() method.
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
