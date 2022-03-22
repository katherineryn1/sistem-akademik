<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Modules\Pengguna\Entity\Pengguna;
use App\Modules\Pengguna\Persistence\PenggunaPersistence;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use function Symfony\Component\String\length;


class User extends Authenticatable implements PenggunaPersistence{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'nomorInduk';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomorInduk',
        'nama',
        'email',
        'password',
        'tanggalLahir',
        'tempatLahir' ,
        'jenisKelamin',
        'alamat',
        'notelepon',
        'fotoprofile',
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

    private function entityToModel(Pengguna $pengguna) {
        return [
            'nomorInduk' => $pengguna->getNomorInduk(),
            'nama' => $pengguna->getNama(),
            'email' => $pengguna->getEmail(),
            'password' => $pengguna->getPassword(),
            'tanggalLahir' => $pengguna->getTanggalLahir(),
            'tempatLahir' => $pengguna->getTempatLahir(),
            'jenisKelamin' => $pengguna->getJenisKelamin(),
            'alamat' =>  $pengguna->getAlamat(),
            'notelepon' =>  $pengguna->getNotelepon(),
            'fotoprofile' => "contoh foto",
            'jabatan' => $pengguna->getJabatan(),
        ];
    }

    private function modelToEntity($model) {
        $res =  $model->map(
            function ($item, $key){
                $pengguna = new Pengguna();
                $pengguna->setNama($item['nama']);
                $pengguna->setJabatan($item['jabatan']);
                $pengguna->setAlamat($item['alamat']);
                $pengguna->setPassword("");
                $pengguna->setEmail($item['email']);
                $pengguna->setFotoprofil([]);
                $pengguna->setJenisKelamin($item['jenisKelamin']);
                $pengguna->setNomorInduk($item['nomorInduk']);
                $pengguna->setNotelepon($item['notelepon']);
                $pengguna->setTanggalLahir(new DateTime($item['tanggalLahir']));
                $pengguna->setTempatLahir($item['tempatLahir']);
                return $pengguna;
            });
        return $res->toArray();
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
        $data = $this->fill($this->entityToModel($pengguna));
        return $data ->save();
    }

    public function updateSingle(Pengguna $pengguna): bool{
        $data = $this::find($pengguna->getNomorInduk());
        $data->update($this->entityToModel($pengguna));
        return $data->save();
    }

    public function deleteSingle($nomorInduk): bool {
        $data = $this::find($nomorInduk);
        return $data->delete();
    }
}
