<?php
    namespace App\Modules\Pengguna\Persistence;

    use App\Modules\Pengguna\Entity\Pengguna;

    interface PenggunaPersistence{
        public  function insertSingle(Pengguna $pengguna): bool ;
        public  function updateSingle(Pengguna $pengguna): bool ;
        public  function deleteSingle(Pengguna $pengguna): bool ;
        public  function getAll(): array ;
        public  function getByAttribute(): array;
    }
?>
