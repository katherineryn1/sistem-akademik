<?php
namespace App\Modules\Dosen\Persistence;

use App\Modules\Dosen\Entity\Dosen;

interface DosenPersistence{
    public  function insertSingle(Dosen $dosen): bool ;
    public  function updateSingle(Dosen $dosen): bool ;
    public  function deleteSingle(string  $dosen): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
