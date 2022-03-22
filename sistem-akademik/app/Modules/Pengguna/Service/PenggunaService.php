<?php
    namespace App\Modules\Pengguna\Service;
    use App\Providers\PenggunaServiceProvider;
use DateTime;
    use App\Modules\Pengguna\Entity\Pengguna;
    use App\Modules\Pengguna\Persistence\PenggunaPersistence;

    class PenggunaService {
        public static PenggunaPersistence $pm;

        function __construct(PenggunaPersistence $pm){
            $this->pm = $pm;
        }

        function __destruct(){
        }

        public  static  function Login(string $email, string  $password): bool {
           $found = self::$pm->getByAttribute( ['email', 'password'] , [$email,$password] , ['=', '='] );
           return count($found) > 0;
        }

        function ResetPassword(string $email){

        }
        /**
         * @return string[]
         */
        public static function TestService(){
            return [self::$pm, "hai"];
        }

        public static function InsertTest(string  $nama,string $password):bool {

            $nowTime = new DateTime();
            $nowTime->format('Y-m-d H:i:s');    // MySQL datetime format
            $nowTime->getTimestamp();

            $newPengguna = new Pengguna();
            $newPengguna->setNama($nama);
            $newPengguna->setNomorInduk("119002");
            $newPengguna->setEmail("new22@mail.com");
            $newPengguna->setPassword($password);
            $newPengguna->setTanggalLahir($nowTime);
            $newPengguna->setTempatLahir("Indonesia");
            $newPengguna->setJenisKelamin("L");
            $newPengguna->setAlamat("Jl Dipatiukut");
            $newPengguna->setNotelepon("081234567");
            $newPengguna->setFotoprofil(unpack('C*', 'The quick fox jumped over the lazy brown dog'));
            $newPengguna->setJabatan("Dosen");

            return self::$pm->insertSingle($newPengguna);
        }

        public static function UpdateTest(string  $nama,string $password):bool {
            $nowTime = new DateTime();
            $nowTime->format('Y-m-d H:i:s');    // MySQL datetime format
            $nowTime->getTimestamp();

            $newPengguna = new Pengguna();
            $newPengguna->setNama($nama);
            $newPengguna->setNomorInduk("1119002");
            $newPengguna->setEmail("test@mail.com");
            $newPengguna->setPassword($password);
            $newPengguna->setTanggalLahir($nowTime);
            $newPengguna->setTempatLahir("Indonesia");
            $newPengguna->setJenisKelamin("L");
            $newPengguna->setAlamat("Jl Dipatiukut");
            $newPengguna->setNotelepon("081234567");
            $newPengguna->setFotoprofil(unpack('C*', 'The quick fox jumped over the lazy brown dog'));
            $newPengguna->setJabatan("Dosen");

            return self::$pm->updateSingle($newPengguna);
        }

        public static function GetAll():array {
            return  self::$pm->getAll();
        }

        public static function DeleteTest(string $nomorInduk):bool {
            return  self::$pm->deleteSingle($nomorInduk);
        }

        function GantiPassword(){

        }
    }
?>
