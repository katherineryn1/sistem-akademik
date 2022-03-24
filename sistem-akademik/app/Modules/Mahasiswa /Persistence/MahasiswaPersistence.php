<?php
namespace App\Modules\Mahasiswa\Persistence;

use App\Modules\Mahasiswa\Entity\Mahasiswa;

interface MahasiswaPersistence{
    public  function insertSingle(Mahasiswa $mahasiswa): bool ;
    public  function updateSingle(Mahasiswa $mahasiswa): bool ;
    public  function deleteSingle(string  $mahasiswa): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
