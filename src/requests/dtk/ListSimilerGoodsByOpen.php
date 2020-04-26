<?php


namespace Requests\Dtk;

use Requests\DtkRequest;

/**
 * 猜你喜欢
 */
class ListSimilerGoodsByOpen extends DtkRequest
{
    public $version = 'v1.2.2';
    public $apiLink = 'https://openapi.dataoke.com/api/goods/list-similer-goods-by-open';
    public $extraParasField = [
        "id",//	大淘客的商品id	是	Number
        "size",//	每页条数	否	Number	默认10 ， 最大值100
    ];
}