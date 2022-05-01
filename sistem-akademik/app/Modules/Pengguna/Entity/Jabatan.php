<?php
namespace App\Modules\Pengguna\Entity;

use ReflectionClass;

class Jabatan{
    public const  DAAK = [ "string" => "Daak" , "int" => 1 ];
    public const  DOSEN = [ "string" => "Dosen" , "int" => 2 ];
    public const  MAHASISWA = [ "string" => "Mahasiswa" , "int" => 3 ];
    private const DEFAULT = [ "string" => "" , "int" => 0 ];

    private $value = self::DEFAULT;

    function __construct(){
    }

    function __destruct(){
        $this->value = [ "string" => "" , "int" => 0 ];
    }
    public function get(): array {
        return $this->value;
    }
    public function getInt(): int {
        return $this->value["int"];
    }
    public function getString():string {
        return $this->value["string"];
    }
    public function set(array $jabatan):void {
        if(!array_key_exists("string", $jabatan) || !array_key_exists("int", $jabatan)){
            error_log("Key Not Valid Jabatan");
            return;
        }
        $this->value = $jabatan;
    }
    private static function createInstance(array $jabatan):Jabatan {
        $newJabatan = new Jabatan();
        $newJabatan->set($jabatan);
        return $newJabatan;
    }
    protected static function getEnumByKey(string $keyType,$data): array {
        $oClass = new ReflectionClass(__CLASS__);
        foreach ($oClass->getConstants() as $key=>$val){
            if($val[$keyType] == $data){
                return $val;
            }
        }
        return self::DEFAULT;
    }

    public static function getEnumBy($data): self {
        if(is_string($data)){
            return  self::createInstance(self::getEnumByKey("string",$data));
        }
        if(is_numeric($data)){
            return  self::createInstance(self::getEnumByKey("int",$data));
        }
        return  self::createInstance(self::DEFAULT);
    }
}?>
