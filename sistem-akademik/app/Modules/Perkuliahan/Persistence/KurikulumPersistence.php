<?php
namespace App\Modules\Perkuliahan\Persistence;

use App\Modules\Perkuliahan\Entity\Kurikulum;

interface KurikulumPersistence{
    public  function insertSingle(Kurikulum $kurikulum): bool ;
    public  function updateSingle(Kurikulum $kurikulum): bool ;
    public  function deleteSingle(int  $id): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
