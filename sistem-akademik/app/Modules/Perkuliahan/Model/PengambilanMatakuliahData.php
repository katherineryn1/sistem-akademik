<?php

namespace App\Modules\Perkuliahan\Model;

use App\Modules\Common\PenggunaBuilder;
use App\Modules\Perkuliahan\Entity\Kurikulum;
use App\Modules\Perkuliahan\Entity\PengambilanMatakuliah;
use App\Modules\Perkuliahan\Helper\PengambilanMatakuliahAdapter;
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
        'posisi_ambil',
        'id_kurikulum',
    ];

    private function modelToEntity($model) {
        return PengambilanMatakuliahAdapter::ArrayDictionariesToEntities($model->toArray());
    }
    public function insertSingle(PengambilanMatakuliah $pengambilanMatakuliah, string $kurikulum): bool {
        $tempArr = PengambilanMatakuliahAdapter::EntityToDictionary($pengambilanMatakuliah);
        $tempArr['id_kurikulum'] = $kurikulum;
        $data = $this->fill($tempArr);
        return $data ->save();
    }

    public function deleteSingle(int $id): bool {
        $data = $this::find($id);
        return $data->delete();
    }

    public function getAll(): array {
        $allData = $this::all();
        print_r($allData);
        return $this->modelToEntity($allData);
    }

    public function getByAttribute(array $attribute, array $value, array $logic): array {
        $mapColumn = array();
        for ($i=0; $i<count($attribute); $i++){
            array_push($mapColumn,[$attribute[$i] , $logic[$i], $value[$i]]);
        }
        $allData = $this::where($mapColumn)->get();
        return $this->modelToEntity($allData);
    }
}
