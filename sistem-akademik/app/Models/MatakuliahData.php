<?php

namespace App\Models;

use App\Modules\Perkuliahan\Entity\Matakuliah;
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
        $res =  $model->map(
            function ($item, $key){
                $matakuliah = new Matakuliah();
                $matakuliah->setKode($item['kode']);
                $matakuliah->setJenis($item['jenis']);
                $matakuliah->setNama($item['nama']);
                $matakuliah->setSifat($item['sifat']);
                $matakuliah->setSks($item['sks']);
                return $matakuliah;
            });
        return $res->toArray();
    }

    public function insertSingle(Matakuliah $matakuliah): bool {
        $data = $this->fill($matakuliah->getArray());
        return $data ->save();
    }

    public function updateSingle(Matakuliah $matakuliah): bool
    {
        $data = $this::find($matakuliah->getKode());
        $data->update($matakuliah->getArray());
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

