<?php

namespace App\Models;

use App\Modules\Perkuliahan\Entity\Nilai;
use App\Modules\Perkuliahan\Persistence\NilaiPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiData extends Model implements NilaiPersistence{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nilai_1',
        'nilai_2',
        'nilai_3',
        'nilai_4',
        'nilai_5',
        'nilai_UAS',
        'nilai_akhir',
        'index',
        'nomor_induk',
        'id_kurikulumm',
    ];

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
