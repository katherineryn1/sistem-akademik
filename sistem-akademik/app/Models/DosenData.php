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
