<?php
namespace App\Modules\Perkuliahan\Persistence;

use App\Modules\Perkuliahan\Entity\Kurikulum;
use App\Modules\Perkuliahan\Entity\PengambilanMatakuliah;

interface PengambilanMatakuliahPersistence{
    public  function insertSingle(PengambilanMatakuliah $pengambilanMatakuliah, string  $kurikulum): bool ;
    public  function deleteSingle(int $id): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
