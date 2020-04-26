<?php


namespace Dtk\Requests\Dtk;

use Dtk\Requests\DtkRequest;

/**
 * 单品详情
 */
class GetGoodsDetails extends DtkRequest
{
    public $version = 'v1.2.2';
    public $apiLink = 'https://openapi.dataoke.com/api/goods/get-goods-details';
    public $extraParasField = [
        "id",//	商品id	是	Number	大淘客商品id，请求时id或goodsId必填其中一个，若均填写，将优先查找当前单品id
        "goodsId",//	淘宝商品id	否	String	id或goodsId必填其中一个，若均填写，将优先查找当前单品id
    ];
}