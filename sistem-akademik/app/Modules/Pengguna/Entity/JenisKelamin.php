<?php
namespace App\Modules\Pengguna\Entity;

use ReflectionClass;

class JenisKelamin{
    public const  LAKI_LAKI = [ "string" => "Laki-Laki" , "int" => 0 ];
    public const  PEREMPUAN = [ "string" => "Perempuan" , "int" => 1 ];
    public const  LAINNYA = [ "string" => "Lainnya" , "int" => 2 ];
    private const DEFAULT = [ "string" => "" , "int" => -1 ];

    private $value = self::DEFAULT;

    function __construct(){
    }

    function __destruct(){
        $this->value = self::DEFAULT;
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
    public function set(array $type):void {
        if(!array_key_exists("string", $type) || !array_key_exists("int", $type)){
            error_log("Key Not Valid Jenis Kelamin");
            return;
        }
        $this->value = $type;
    }
    private static function createInstance(array $type):self {
        $newType = new self();
        $newType->set($type);
        return $newType;
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

}
