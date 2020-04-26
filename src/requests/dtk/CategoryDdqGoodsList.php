<?php


namespace Requests\Dtk;

use Requests\DtkRequest;
/**
 * 咚咚抢
 */
class CategoryDdqGoodsList extends DtkRequest
{
    public $version = 'v1.2.0';
    public $apiLink = 'https://openapi.dataoke.com/api/category/ddq-goods-list';
    public $extraParasField = [
        "roundTime",//	场次时间	否	String	默认为当前场次，场次时间输入方式：yyyy-mm-dd hh:mm:ss
    ];
}