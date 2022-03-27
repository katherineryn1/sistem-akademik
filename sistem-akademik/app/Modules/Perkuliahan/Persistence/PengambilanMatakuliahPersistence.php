<?php
namespace App\Modules\Perkuliahan\Persistence;

use App\Modules\Perkuliahan\Entity\Kurikulum;
use App\Modules\Perkuliahan\Entity\PengambilanMatakuliah;

interface PengambilanMatakuliahPersistence{
    public  function insertUserKurikulum(User  $nomorInduk,Kurikulum $kurikulum): bool ;
    public  function deleteUserKurikulum(User  $nomorInduk,Kurikulum $kurikulum): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
