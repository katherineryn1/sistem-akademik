<?php
namespace App\Modules\Pengguna\Entity;

use ReflectionClass;

class Jabatan{
    public const  DAAK = [ "string" => "daak" , "int" => 1 ];
    public const  DOSEN = [ "string" => "dosen" , "int" => 2 ];
    public const  MAHASISWA = [ "string" => "mahasiswa" , "int" => 3 ];
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
    protected static function getEnumByString(string $str): array {

        $oClass = new ReflectionClass(__CLASS__);
        $str = strtolower($str);
        foreach ($oClass->getConstants() as $key=>$val){
            if($val['string'] == $str){
                return $val;
            }
        }
        return self::DEFAULT;
    }

    protected static function getEnumByInt(int $int): array {
        $oClass = new ReflectionClass(__CLASS__);
        foreach ($oClass->getConstants() as $key=>$val){
            if($val['int'] == $int){
                return $val;
            }
        }
        return self::DEFAULT;
    }

    public static function getEnumBy($data): array {
        if(is_string($data)){
            return  self::getEnumByString($data);
        }
        if(is_numeric($data)){
            return  self::getEnumByInt($data);
        }
        return  self::DEFAULT;
    }
}?>
