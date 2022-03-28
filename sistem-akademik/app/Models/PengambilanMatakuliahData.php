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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomor_induk',
        'id_kurikulum',
    ];

    public function insertUserKurikulum(string $nomorInduk,string $kurikulum): bool
    {
        $pMK = array();
        $pMK['nomor_induk'] = $nomorInduk;
        $pMK['id_kurikulum'] = $kurikulum;
        $data = $this->fill($pMK);
        return $data ->save();
    }

    public function deleteUserKurikulum(string $nomorInduk, string $kurikulum): bool
    {
        $allData = $this::where([
                ['nomor_induk', '=', $nomorInduk->ge],
                ['id_kurikulum', '=', $kurikulum],
        ])->get();
        return $allData->delete();
    }

    public function getAll(): array
    {
        $allData = $this::all();
        return $allData->toArray();
    }

    public function getByAttribute(array $attribute, array $value, array $logic): array
    {
        $mapColumn = array();
        for ($i=0; $i<count($attribute); $i++){
            array_push($mapColumn,[$attribute[$i] , $logic[$i], $value[$i]]);
        }
        $allData = $this::where($mapColumn)->get();
        return $allData->toArray();
    }
}
