<?php

namespace Dtk\Requests;

trait BindSteategyClass
{
    function __call($name, $arguments)
    {
        return self::BindClass($name);
    }
    static function __callStatic($name, $arguments)
    {
        return self::BindClass($name);
    }
    static function BindClass($name){
        try{
            $namespace = "Dtk\\Requests\\Dtk\\".$name;
            $class = new $namespace;
        }catch (\Error $e){
            throw new \Error("当前策略不存在");
        }
        return $class;
    }
}