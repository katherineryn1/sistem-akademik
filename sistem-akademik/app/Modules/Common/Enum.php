<?php


namespace App\Modules\Common;

use ReflectionClass;
abstract class Enum{
    private const DEFAULT = [ "string" => "" , "int" => -1 ];
    protected $value = self::DEFAULT;

    function __construct(){
    }

    function __destruct(){
        $this->value = self::DEFAULT;
    }

    public function get(): array {
        return $this->value;
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
    protected abstract static function createInstance(array $type):self ;

    public abstract function set(array $type):void;

    public abstract static function getEnumBy($data): self;


}
