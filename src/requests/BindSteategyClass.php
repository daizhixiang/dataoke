<?php

namespace DaTaoKe\Requests;

use DaTaoKe\Util\DocParserFactory;
use DaTaoKe\Util\Colors;

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

    static function BindClass($name)
    {
        try {
            $namespace = "DaTaoKe\\Requests\\Dtk\\" . $name;
            $class = new $namespace;
        } catch (\Error $e) {
            throw new \Error("当前策略不存在");
        }
        return $class;
    }

    static function GetAllSteategy($apiname = null, $IsExtraParasField = false)
    {
        $str = opendir(__DIR__ . '/dtk');//指定获取此目录下的文件及文件夹列表

        while (($filename = readdir($str)) !== false) {
            if ($filename != "." && $filename != "..") {
                //判断是否是文件，文件放在文件列表数组中，子文件夹放在子文件夹列表数组中
                if (is_file(__DIR__ . '/dtk/' . $filename)) {
                    $file_array[] = substr($filename, 0, strlen($filename) - 4);
                }
            }
        }
        closedir($str);

        $func = function ($classname) use ($apiname, $IsExtraParasField) {
            $steategy = self::BindClass($classname);
            $reflection = new \ReflectionClass ($steategy);
            //通过反射获取类的注释
            $class_doc = $reflection->getDocComment();
            //解析类的注释头
            $parase_result = DocParserFactory::getInstance()->parse($class_doc);

            if ($apiname && $apiname != '' && $apiname != []) {
                if (is_string($apiname) && $parase_result['long_description'] != $apiname) {
                    return true;
                } elseif (is_array($apiname) && !in_array($parase_result['long_description'], $apiname)) {
                    return true;
                }
            }

            $colors = new Colors();
            echo "[\n";
            echo $colors->getColoredString("    策略名称:   ", "blue") . "$classname\n";
            echo $colors->getColoredString("    接口名称:   ", "blue") . "{$parase_result['long_description']}\n";
            echo $colors->getColoredString("    接口版本:   ", "blue") . "$steategy->version\n";
            echo $colors->getColoredString("    接口地址:   ", "blue") . "$steategy->api\n";

            if ($IsExtraParasField) {
                echo $colors->getColoredString("    接口需要的参数信息:   ", "blue") . "[\n";
                foreach ($steategy->extraParasField as $k => $v) {
                    echo $colors->getColoredString("        " . $k, "green") . ": {$v}\n";
                }
                echo "    ]\n";
            }
            echo "]\n";
        };
        foreach ($file_array as $key => $val) {
            $func($val);
        }

        return true;
    }
}