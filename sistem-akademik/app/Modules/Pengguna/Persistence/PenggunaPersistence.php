<?php
    namespace App\Modules\Pengguna\Persistence;

    use App\Modules\Pengguna\Entity\Pengguna;

    interface PenggunaPersistence{
        public  function insertSingle(Pengguna $pengguna): bool ;
        public  function updateSingle(Pengguna $pengguna): bool ;
        public  function deleteSingle(string  $nomorInduk): bool ;
        public  function getAll(): array ;
        public  function getByAttribute(array  $attribute,array  $value , array  $logic): array;
    }
?>
