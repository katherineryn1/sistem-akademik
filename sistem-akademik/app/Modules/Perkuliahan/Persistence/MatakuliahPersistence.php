<?php
namespace App\Modules\Perkuliahan\Persistence;

use App\Modules\Perkuliahan\Entity\Matakuliah;

interface MatakuliahPersistence{
    public  function insertSingle(Matakuliah $matakuliah): bool ;
    public  function updateSingle(Matakuliah $matakuliah): bool ;
    public  function deleteSingle(string  $id): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
