<?php


namespace App\Modules\Common;


interface CommonAdapter{
    public static function EntityToDictionary(object $object): array;
    public static function DictionaryToEntity(array $object):  object;
    public static function ArrayEntitiesToDictionaries(array  $object): array ;
    public static function ArrayDictionariesToEntities(array  $object): array ;

}
