<?php
namespace App\Modules\Pengumuman\Persistence;

use App\Modules\Pengumuman\Entity\Pengumuman;

interface PengumumanPersistence{
    public  function insertSingle(Pengumuman $pengumuman): bool ;
    public  function updateSingle(Pengumuman $pengumuman): bool ;
    public  function deleteSingle(int  $id): bool ;
    public  function getAll(): array ;
    public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
}
?>
