<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 猜你喜欢
 */
class ListSimilerGoodsByOpen extends DtkRequest
{
    public $version = 'v1.2.2';
    public $api = '/goods/list-similer-goods-by-open';
    public $extraParasField = [
        "大淘客的商品id" => "id",//		是	Number
        "每页条数" => "size",//		否	Number	默认10 ， 最大值100
    ];
}