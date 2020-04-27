<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;
/**
 * 咚咚抢
 */
class CategoryDdqGoodsList extends DtkRequest
{
    public $version = 'v1.2.0';
    public $api = '/category/ddq-goods-list';
    public $extraParasField = [
        "场次时间" => "roundTime",//		否	String	默认为当前场次，场次时间输入方式：yyyy-mm-dd hh:mm:ss
    ];
}