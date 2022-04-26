<?php

namespace App\Modules\Dosen\Model;

use App\Modules\Dosen\Entity\Dosen;
use App\Modules\Dosen\Helper\DosenAdapter;
use App\Modules\Dosen\Persistence\DosenPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenData extends Model implements  DosenPersistence{
    use HasFactory;

    protected $primaryKey = 'nomor_induk';
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
        return DosenAdapter::ArrayDictionariesToEntities($model->toArray());
    }
    public function insertSingle(Dosen $dosen): bool {
        $data = $this->fill(DosenAdapter::EntityToDictionary($dosen));
        return $data ->save();
    }

    public function updateSingle(Dosen $dosen): bool{
        $data = $this::find($dosen->getNomorInduk());
        $data->update(DosenAdapter::EntityToDictionary($dosen));
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
