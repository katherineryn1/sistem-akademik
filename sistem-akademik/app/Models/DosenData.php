<?php

namespace App\Models;

use App\Modules\Dosen\Entity\Dosen;
use App\Modules\Dosen\Persistence\DosenPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenData extends Model implements  DosenPersistence{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomor_induk',
        'program_studi',
        'bidang_ilmu',
        'gelar_akademik',
        'status_ikatan_kerja',
        'status_dosen'
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
                $dosen = new Dosen();
                $dosen->setNomorInduk($item['nomor_induk']);
                $dosen->setProgramStudi($item['program_studi']);
                $dosen->setBidangIlmu($item['bidang_ilmu']);
                $dosen->setGelarAkademik($item['gelar_akademik']);
                $dosen->setStatusIkatanKerja($item['status_ikatan_kerja']);
                $dosen->setStatusDosen($item['status_dosen']);
                return $dosen;
            });
        return $res->toArray();
    }
    public function insertSingle(Dosen $dosen): bool {
        $data = $this->fill($dosen->getArray());
        return $data ->save();
    }

    public function updateSingle(Dosen $dosen): bool{
        $data = $this::find($dosen->getNomorInduk());
        $data->update($dosen->getArray());
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
