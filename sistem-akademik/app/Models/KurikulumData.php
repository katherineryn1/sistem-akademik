<?php

namespace App\Models;

use App\Modules\Perkuliahan\Entity\Kurikulum;
use App\Modules\Perkuliahan\Persistence\KurikulumPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KurikulumData extends Model implements KurikulumPersistence{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tahun',
        'semester',
        'kelas',
        'jumlah_pertemuan',
        'matakuliah',
        'dosen',
    ];

    private function modelToEntity($model) {
        $res =  $model->map(
            function ($item, $key){
                $kurikulum = new Kurikulum();
                $kurikulum->setId($item['id']);
                $kurikulum->setTahun($item['tahun']);
                $kurikulum->setSemester($item['semester']);
                $kurikulum->setKelas($item['kelas']);
                $kurikulum->setJumlahPertemuan($item['jumlah_pertemuan']);
                $kurikulum->setMatakuliah($item['matakuliah']);
                $kurikulum->setDosen($item['dosen']);
                return $kurikulum;
            });
        return $res->toArray();
    }
    public function insertSingle(Kurikulum $kurikulum): bool
    {
        $data = $this->fill($kurikulum->getArray());
        return $data ->save();
    }

    public function updateSingle(Kurikulum $kurikulum): bool  {
        $data = $this::find($kurikulum->getId());
        $data->update($kurikulum->getArray());
        return $data->save();
    }

    public function deleteSingle(int $id): bool {
        $data = $this::find($id);
        return $data->delete();
    }

    public function getAll(): array {
        $allData = $this::all();
        return $this->modelToEntity($allData);
    }

    public function getByAttribute(array $attribute, array $value, array $logic): array{
        $mapColumn = array();
        for ($i=0; $i<count($attribute); $i++){
            array_push($mapColumn,[$attribute[$i] , $logic[$i], $value[$i]]);
        }
        $allData = $this::where($mapColumn)->get();
        return $this->modelToEntity($allData);
    }
}
