<?php
namespace App\Modules\Skripsi\Persistence;

use App\Modules\Skripsi\Entity\Skripsi;

interface SkripsiPersistence{
    public  function insertSingle(Skripsi $skripsi): bool ;
    public  function updateSingle(Skripsi $skripsi): bool ;
    public  function deleteSingle(string  $skripsi): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
