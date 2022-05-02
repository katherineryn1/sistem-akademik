<?php


namespace App\Modules\Common;


abstract class Enum{
    private const DEFAULT = [ "string" => "" , "int" => -1 ];
    private $value = self::DEFAULT;

    function __construct(){
    }

    function __destruct(){
        $this->value = self::DEFAULT;
    }



}
