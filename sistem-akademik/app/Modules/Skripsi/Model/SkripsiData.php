<?php


namespace App\Modules\Skripsi\Model;


use App\Modules\Skripsi\Entity\Skripsi;
use App\Modules\Skripsi\Persistence\SkripsiPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkripsiData extends Model implements SkripsiPersistence{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '-nama kolom skripsi ... ---',
        '-nama kolom skripsi 2 ... ---',
    ];

    public function insertSingle(Skripsi $skripsi): bool
    {
        // TODO: Implement insertSingle() method.
    }

    public function updateSingle(Skripsi $skripsi): bool
    {
        // TODO: Implement updateSingle() method.
    }

    public function deleteSingle(string $skripsi): bool
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
