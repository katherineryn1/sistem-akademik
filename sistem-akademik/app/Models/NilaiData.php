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

    private function modelToEntity($model) {
        $res =  $model->map(
            function ($item, $key){
                $nilai = new Nilai();
                $nilai->setId($item['id']);
                $nilai->setNilai1($item['nilai_1']);
                $nilai->setNilai2($item['nilai_2']);
                $nilai->setNilai3($item['nilai_3']);
                $nilai->setNilai4($item['nilai_4']);
                $nilai->setNilai5($item['nilai_5']);
                $nilai->setNilaiUAS($item['nilai_UAS']);
                $nilai->setNilaiAkhir($item['nilai_akhir']);
                $nilai->setIndex($item['index']);
                $nilai->setMahasiswaByNomorInduk($item['nilai_id']);
                return $nilai;
            });
        return $res->toArray();
    }
    public function insertSingle(Nilai $nilai,int $kurikulum): bool
    {
        $n =  $nilai->getArray();
        $n['id_kurikulum'] = $kurikulum;
        $data = $this->fill($n);
        return $data ->save();
    }

    public function updateSingle(Nilai $nilai): bool
    {
        $data = $this::find($nilai>getId());
        $data->update($nilai->getArray());
        return $data->save();
    }

    public function deleteSingle(int $id): bool
    {
        $data = $this::find($id);
        return $data->delete();
    }

    public function getAll(): array
    {
        $allData = $this::all();
        return $this->modelToEntity($allData);
    }

    public function getByAttribute(array $attribute, array $value, array $logic): array
    {
        $mapColumn = array();
        for ($i=0; $i<count($attribute); $i++){
            array_push($mapColumn,[$attribute[$i] , $logic[$i], $value[$i]]);
        }
        $allData = $this::where($mapColumn)->get();
        return $this->modelToEntity($allData);
    }
}
