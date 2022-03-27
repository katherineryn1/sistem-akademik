<?php
namespace App\Modules\Perkuliahan\Persistence;

use App\Modules\Perkuliahan\Entity\Nilai;

interface NilaiPersistence{
    public  function insertSingle(Nilai $nilai,int $kurikulum): bool ;
    public  function updateSingle(Nilai $nilai): bool ;
    public  function deleteSingle(int  $id): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
