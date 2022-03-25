<?php

namespace App\Models;

use App\Modules\Mahasiswa\Entity\Mahasiswa;
use App\Modules\Mahasiswa\Persistence\MahasiswaPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaData extends Model implements MahasiswaPersistence{
    use HasFactory;
    protected $primaryKey = 'nomor_induk';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomor_induk',
        'jurusan',
        'tahun_masuk',
        'tahun_lulus',
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
                $mahasiswa = new Mahasiswa();
                $mahasiswa->setNomorInduk($item['nomor_induk']);
                $mahasiswa->setJurusan($item['jurusan']);
                $mahasiswa->setTahunMasuk($item['tahun_masuk']);
                $mahasiswa->setTahunLulus($item['tahun_lulus']);
                return $mahasiswa;
            });
        return $res->toArray();
    }
    public function insertSingle(Mahasiswa $mahasiswa): bool {
        $data = $this->fill($mahasiswa->getArray());
        return $data ->save();
    }

    public function updateSingle(Mahasiswa $mahasiswa): bool{
        $data = $this::find($mahasiswa->getNomorInduk());
        $data->update($mahasiswa->getArray());
        return $data->save();
    }

    public function deleteSingle(string  $nomorInduk): bool {
        $data = $this::find($nomorInduk);
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
