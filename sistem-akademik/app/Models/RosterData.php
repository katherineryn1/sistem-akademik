<?php

namespace App\Models;

use App\Modules\Perkuliahan\Entity\Roster;
use App\Modules\Perkuliahan\Helper\RosterAdapter;
use App\Modules\Perkuliahan\Persistence\RosterPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class RosterData extends Model implements RosterPersistence {
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'ruangan',
        'id_kurikulum',
    ];

    private function modelToEntity($model) {
        return RosterAdapter::ArrayDictionariesToEntities($model->toArray());
    }

    public function insertSingle(Roster $roster,int $kurikulum): bool
    {
        $kur = RosterAdapter::EntityToDictionary($roster);
        $kur['id_kurikulum'] = $kurikulum;
        $data = $this->create($kur);
        return $data->save();
    }

    public function updateSingle(Roster $roster): bool
    {
        $data = $this::find($roster->getId());
        $data->update(RosterAdapter::EntityToDictionary($roster));
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
