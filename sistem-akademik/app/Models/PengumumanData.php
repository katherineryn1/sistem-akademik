<?php

namespace App\Models;

use App\Modules\Pengumuman\Helper\PengumumanAdapter;
use DateTime;
use App\Modules\Pengumuman\Entity\Pengumuman;
use App\Modules\Pengumuman\Persistence\PengumumanPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanData extends Model implements  PengumumanPersistence{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'keterangan',
        'tanggal',
    ];

    private function modelToEntity($model) {
        return PengumumanAdapter::ArrayDictionariesToEntities($model->toArray());
    }
    public function insertSingle(Pengumuman $pengumuman): bool {
        $data = $this->fill(PengumumanAdapter::EntityToDictionary($pengumuman));
        return $data ->save();
    }

    public function updateSingle(Pengumuman $pengumuman): bool{
        $data = $this::find($pengumuman->getId());
        $data->update(PengumumanAdapter::EntityToDictionary($pengumuman));
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
