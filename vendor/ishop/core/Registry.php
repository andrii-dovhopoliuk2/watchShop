<?php


namespace ishop;

class Registry{

    use TSingletone;
    public static $propeties = [];

    public  function setPropeties($name,$value){
        self::$propeties[$name] = $value;
    }
    public  function getProperty($name)
    {
     if (isset(self::$propeties[$name])) {
         return self::$propeties[$name];
     }
     return null;
    }
    public    function getProperties(){
        return self::$propeties;
    }
}