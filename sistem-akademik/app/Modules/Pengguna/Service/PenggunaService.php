<?php
    namespace App\Modules\Pengguna\Service;
    use App\Providers\PenggunaServiceProvider;
    use DateTime;
    use App\Modules\Pengguna\Entity\Pengguna;
    use App\Modules\Pengguna\Persistence\PenggunaPersistence;

    class PenggunaService {
        private static PenggunaPersistence $pm;

        function __construct(PenggunaPersistence $pm){
            self::$pm = $pm;
        }

        function __destruct(){
        }

        /**
         * @param string $email
         * @param string $password
         * @return bool
         */
        public  static  function login(string $email, string  $password): bool {
           $found = self::$pm->getByAttribute( ['email', 'password'] , [$email,$password] , ['=', '='] );
           return count($found) > 0;
        }

        /**
         * @return string[]
         */
        public static function testService(){
            return [self::$pm, "hai"];
        }

        /**
         * @param string $email
         * @return int
         */
        public static function resetPassword(string $email): int {
            $found = self::$pm->getByAttribute(['email'], [$email], ['=']);
            if(count($found) <= 0){
                return 0;
            }
            //Asumsi membuat password baru dengan mengubah password ke password default
            $defaultPassword = "default12345";
            $found[0]->setPassword($defaultPassword);
            if(self::$pm->updateSingle($found[0]) == true){
                return  1;
            }else{
                return  0;
            }
        }

        /**
         * @param string $email
         * @param string $password
         * @return bool
         */
        public static function gantiPassword(string $email, string  $newPassword): bool {
            $found = self::$pm->getByAttribute(['email'], [$email], ['=']);
            if(count($found) <= 0){
                return false;
            }
            $found[0]->setPassword($newPassword);
            return self::$pm->updateSingle($found[0]);
        }

        /**
         * @param string $nama
         * @param string $password
         * @param string $nomorInduk
         * @param string $email
         * @param string $tanggalLahir
         * @param string $tempatLahir
         * @param string $jenisKelamin
         * @param string $alamat
         * @param string $notelepon
         * @param string $jabatan
         * @return bool
         * @throws \Exception
         */
        public static function insert(string  $nama,string $password, string $nomorInduk,string $email,
                                      string $tanggalLahir, string $tempatLahir,string $jenisKelamin, string  $alamat,
                                      string $notelepon, string $jabatan):bool {
            $newPengguna = new Pengguna();
            $newPengguna->setNama($nama);
            $newPengguna->setPassword($password);
            $newPengguna->setNomorInduk($nomorInduk);
            $newPengguna->setEmail($email);
            $newPengguna->setTanggalLahir(new DateTime($tanggalLahir));
            $newPengguna->setTempatLahir($tempatLahir);
            $newPengguna->setJenisKelamin($jenisKelamin);
            $newPengguna->setAlamat($alamat);
            $newPengguna->setNotelepon($notelepon);
            $newPengguna->setFotoprofil(unpack('C*', 'Will be remove'));
            $newPengguna->setJabatan($jabatan);
            return self::$pm->insertSingle($newPengguna);
        }

        /**
         * @param string $nama
         * @param string $password
         * @param string $nomorInduk
         * @param string $email
         * @param string $tanggalLahir
         * @param string $tempatLahir
         * @param string $jenisKelamin
         * @param string $alamat
         * @param string $notelepon
         * @param string $jabatan
         * @return bool
         * @throws \Exception
         */
        public static function update(string  $nama,string $password, string $nomorInduk,string $email,
                                      string $tanggalLahir, string $tempatLahir,string $jenisKelamin, string  $alamat,
                                      string $notelepon, string $jabatan):bool {
            $newPengguna = new Pengguna();
            $newPengguna->setNama($nama);
            $newPengguna->setPassword($password);
            $newPengguna->setNomorInduk($nomorInduk);
            $newPengguna->setEmail($email);
            $newPengguna->setTanggalLahir(new DateTime($tanggalLahir));
            $newPengguna->setTempatLahir($tempatLahir);
            $newPengguna->setJenisKelamin($jenisKelamin);
            $newPengguna->setAlamat($alamat);
            $newPengguna->setNotelepon($notelepon);
            $newPengguna->setFotoprofil(unpack('C*', 'Will be remove'));
            $newPengguna->setJabatan($jabatan);

            return self::$pm->updateSingle($newPengguna);
        }

        /**
         * @param string $nomorInduk
         * @return bool
         */
        public static function delete(string $nomorInduk):bool {
            return  self::$pm->deleteSingle($nomorInduk);
        }

        public static function userInfo(string $attribute,string $value): array{
            $found = self::$pm->getByAttribute([$attribute], [$value], ['=']);
            if(count($found) <= 0){
                return [];
            }
            $dto = array();
            foreach ($found as $data) {
                array_push($dto, $data->getArray());
            }
            return $dto;
        }

        public static function getAll():array {
            $found =self::$pm->getAll();
            if(count($found) <= 0){
                return [];
            }
            $dto = array();
            foreach ($found as $data) {
                array_push($dto, $data->getArray());
            }
            return $dto;
        }
    }
?>
