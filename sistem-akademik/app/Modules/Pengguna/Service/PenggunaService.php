<?php
    namespace App\Modules\Pengguna\Service;
    use App\Modules\Pengguna\Persistence\PenggunaPersistence;

class PenggunaService {
        private  $pm;

        function __construct(PenggunaPersistence $pm){
            $this->pm = $pm;
        }

        function __destruct(){
        }

        function Login(){

        }

        function ResetPassword(){

        }
        public function testService(){
            return ["hallo", "hai"];

        }
        function GantiPassword(){

        }
    }
?>
