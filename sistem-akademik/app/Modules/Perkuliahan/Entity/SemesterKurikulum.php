<?php


namespace App\Modules\Perkuliahan\Entity;

use ReflectionClass;
class SemesterKurikulum{
    public const  GANJIL = [ "string" => "Ganjil" , "int" => 0 ];
    public const  GENAP = [ "string" => "Genap" , "int" => 1 ];
    public const  PENDEK = [ "string" => "Pendek" , "int" => 2 ];
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
            error_log("Key Not Valid Semester Kurikulum");
            return;
        }
        $this->value = $type;
    }
    private static function createInstance(array $type):self {
        $newInstance = new self();
        $newInstance->set($type);
        return $newInstance;
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

    public static function getEnumString(): array {
        $oClass = new ReflectionClass(__CLASS__);
        $enumAll = [];
        foreach ($oClass->getConstants() as $key=>$val){
            array_push($enumAll,$val['string']);
        }
        return $enumAll;
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
