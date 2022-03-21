<?php
    namespace App\Modules\Pengguna\Persistence;

    use App\Modules\Pengguna\Entity\Pengguna;

    interface PenggunaPersistence{
        public  function insert(Pengguna $pengguna): bool ;
        public  function update(Pengguna $pengguna): bool ;
        public  function delete(Pengguna $pengguna): bool ;
        public  function getAll(): array ;
        public  function getByAttribute(): array;
    }
?>
