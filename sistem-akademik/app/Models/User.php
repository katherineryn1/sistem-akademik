<?php

namespace App\Models;

use App\Modules\Pengguna\Helper\PenggunaAdapter;
use DateTime;
use App\Modules\Pengguna\Entity\Pengguna;
use App\Modules\Pengguna\Persistence\PenggunaPersistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements PenggunaPersistence{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_data';

    protected $primaryKey = 'nomor_induk';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomor_induk',
        'nama',
        'email',
        'password',
        'tanggal_lahir',
        'tempat_lahir' ,
        'jenis_kelamin',
        'alamat',
        'notelepon',
        'foto_profile',
        'jabatan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
        return PenggunaAdapter::ArrayDictionariesToEntities($model->toArray());
    }

    public function getAll(): array {
        $allData = $this::all();
        return $this->modelToEntity($allData);
    }

    public function getByAttribute(array  $attribute,array  $value , array  $logic): array  {
        $mapColumn = array();
        for ($i=0; $i<count($attribute); $i++){
           array_push($mapColumn,[$attribute[$i] , $logic[$i], $value[$i]]);
        }
        $allData = $this::where($mapColumn)->get();
        return $this->modelToEntity($allData);
    }

    public function insertSingle(Pengguna $pengguna): bool {
        $data = $this->fill(PenggunaAdapter::EntityToDictionary($pengguna));

        print_r(PenggunaAdapter::EntityToDictionary($pengguna));

        $res  = $data ->save();
        return $res;
    }

    public function updateSingle(Pengguna $pengguna): bool{
        $data = $this::find($pengguna->getNomorInduk());
        $data->update(PenggunaAdapter::EntityToDictionary($pengguna));
        return $data->save();
    }

    public function deleteSingle($nomorInduk): bool {
        $data = $this::find($nomorInduk);
        return $data->delete();
    }
}

























