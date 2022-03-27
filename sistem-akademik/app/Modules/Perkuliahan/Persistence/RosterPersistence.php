<?php
namespace App\Modules\Perkuliahan\Persistence;

use App\Modules\Perkuliahan\Entity\Roster;

interface RosterPersistence{
    public  function insertSingle(Roster $roster): bool ;
    public  function updateSingle(Roster $roster): bool ;
    public  function deleteSingle(string  $id): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
