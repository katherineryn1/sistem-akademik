<?php
namespace App\Modules\Perkuliahan\Persistence;

use App\Modules\Perkuliahan\Entity\PengambilanMatakuliah;

interface PengambilanMatakuliahPersistence{
    public  function insertSingle(PengambilanMatakuliah $pengambilanMK): bool ;
    public  function updateSingle(PengambilanMatakuliah $pengambilanMK): bool ;
    public  function deleteSingle(int  $id): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
