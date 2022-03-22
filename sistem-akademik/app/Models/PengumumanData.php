<?php

namespace App\Models;

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
        $res =  $model->map(
            function ($item, $key){
                $pengumuman = new Pengumuman();
                $pengumuman->setId($item['id']);
                $pengumuman->setTanggal(new DateTime($item['tanggal']));
                $pengumuman->setKeterangan($item['keterangan']);
                $pengumuman->setJudul($item['judul']);
                return $pengumuman;
            });
        return $res->toArray();
    }
    public function insertSingle(Pengumuman $pengumuman): bool {
        $data = $this->fill($pengumuman->getArray());
        return $data ->save();
    }

    public function updateSingle(Pengumuman $pengumuman): bool{
        $data = $this::find($pengumuman->getId());
        $data->update($pengumuman->getArray());
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
