<?php
namespace App\Modules\Perkuliahan\Persistence;

use App\Modules\Perkuliahan\Entity\Kehadiran;

interface KehadiranPersistence{
    public  function insertSingle(Kehadiran $kehadiran,int $roster): bool ;
    public  function updateSingle(Kehadiran $kehadiran): bool ;
    public  function deleteSingle(string  $id): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
