<?php
namespace App\Modules\Skripsi\Persistence;

use App\Modules\Skripsi\Entity\DetailSkripsi;

interface DetailSkripsiPersistence{
    public  function insertSingle(DetailSkripsi $skripsi): bool ;
    public  function updateSingle(DetailSkripsi $skripsi): bool ;
    public  function deleteSingle(string  $skripsi): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
