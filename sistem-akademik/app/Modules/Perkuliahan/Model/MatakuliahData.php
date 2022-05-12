<?php

namespace App\Modules\Perkuliahan\Model;

use App\Modules\Perkuliahan\Entity\Matakuliah;
use App\Modules\Perkuliahan\Helper\MatakuliahAdapter;
use App\Modules\Perkuliahan\Persistence\MatakuliahPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatakuliahData extends Model implements MatakuliahPersistence{
    use HasFactory;

    protected $primaryKey = 'kode';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'nama',
        'jenis',
        'sifat',
        'sks',
    ];
    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    private function modelToEntity($model) {
        return MatakuliahAdapter::ArrayDictionariesToEntities($model->toArray());
    }

    public function insertSingle(Matakuliah $matakuliah): bool {
        $dataMK = MatakuliahAdapter::EntityToDictionary($matakuliah);
        $dataMK['jenis'] = $dataMK['jenis']->getInt();
        $dataMK['sifat'] = $dataMK['sifat']->getInt();
        $data = $this->create($dataMK);
        return $data ->save();
    }

    public function updateSingle(Matakuliah $matakuliah): bool
    {
        $data = $this::find($matakuliah->getKode());
        $dataMK = MatakuliahAdapter::EntityToDictionary($matakuliah);
        $dataMK['jenis'] = $dataMK['jenis']->getInt();
        $dataMK['sifat'] = $dataMK['sifat']->getInt();
        $data->update($dataMK);
        return $data->save();
    }

    public function deleteSingle(string $id): bool
    {
        $data = $this::find($id);
        return $data->delete();
    }

    public function getAll(): array {
        $allData = $this::all();
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

