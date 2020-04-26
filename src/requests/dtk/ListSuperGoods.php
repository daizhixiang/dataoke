<?php


namespace Requests\Dtk;

use Requests\DtkRequest;

/**
 * 超级搜索
 */
class ListSuperGoods extends DtkRequest
{
    public $version = 'v1.2.1';
    public $apiLink = 'https://openapi.dataoke.com/api/goods/list-super-goods';
    public $extraParasField = [
        "type",//	搜索类型	是	Number	0-综合结果，1-大淘客商品，2-联盟商品
        "pageId",//	页码	是	Number	请求的页码，默认参数1
        "pageSize",//	每页条数	是	Number	默认为20，最大值100
        "keyWords",//	关键词搜索	是	String
        "tmall",//	是否天猫商品	否	Number	1-天猫商品，0-所有商品，不填默认为0
        "haitao",//	是否海淘商品	否	Number	1-海淘商品，0-所有商品，不填默认为0
        "sort",//	排序字段	否	String	排序字段信息 销量（total_sales） 价格（price），排序_des（降序），排序_asc（升序）
    ];
}