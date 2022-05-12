<?php

namespace App\Modules\Perkuliahan\Model;

use App\Modules\Common\PengambilanMatakuliahBuilder;
use App\Modules\Perkuliahan\Entity\Kehadiran;
use App\Modules\Perkuliahan\Helper\KehadiranAdapter;
use App\Modules\Perkuliahan\Persistence\KehadiranPersistence;
use App\Modules\Perkuliahan\Service\PengambilanMatakuliahService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranData extends Model implements KehadiranPersistence{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keterangan',
        'id_pengambilan_matakuliah',
        'id_roster',
    ];

    private function modelToEntity($model) {
        return KehadiranAdapter::ArrayDictionariesToEntities($model->toArray());
    }
    public function insertSingle(Kehadiran $kehadiran,int $roster): bool
    {
        $k = KehadiranAdapter::EntityToDictionary($kehadiran);
        $k['id_roster'] = $roster;
        $k['keterangan'] = $k['keterangan']->getInt();
        $data = $this->create($k);
        return $data ->save();
    }

    public function updateSingle(Kehadiran $kehadiran): bool
    {
        $data = $this::find($kehadiran->getId());
        $k = KehadiranAdapter::EntityToDictionary($kehadiran);
        $k['keterangan'] = $k['keterangan']->getInt();
        $data->update($k);
        return $data->save();
    }

    public function deleteSingle(string $id): bool
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
