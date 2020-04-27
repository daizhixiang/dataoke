<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;
/**
 * 联盟搜索
 */
class GetTbService extends DtkRequest
{
    public $version = 'v2.0.0';
    public $api = '/tb-service/get-tb-service';
    public $extraParasField = [
        "第几页" => "pageNo",//	是	Number	默认1
        "每页条数" => "pageSize",//	是	Number	页大小， 默认20，范围值1~100
        "查询词" => "keyWords",//	是	String	查询词不能为空
        "排序" => "sort",//	否	String	排序指标：销量（total_sales），淘客佣金比率（tk_rate）， 累计推广量（tk_total_sales），总支出佣金（tk_total_commi），价格（price）,排序方式：排序_des（降序），排序_asc（升序）,示例：升序查询销量：total_sales_asc
        "是否商城商品" => "source",//	否	Number	设置为1表示该商品是属于淘宝商城商品，设置为非1或不设置表示不判断这个属性（和overseas字段冲突，若已请求source，请勿再请求overseas）
        "是否海外商品" => "overseas",//	否	Number	是否海外商品，设置为1表示该商品是属于海外商品，设置为非1或不设置表示不判断这个属性（和source字段冲突，若已请求overseas，请勿再请求source）
        "折扣价范围上限" => "endPrice",//	否	Number	单位：元
        "折扣价范围下限" => "startPrice",//	否	Number	单位：元
        "媒体淘客佣金比率下限" => "startTkRate",//	否	Number	如：1234表示12.34%
        "商品筛选-淘客佣金比率上限" => "endTkRate",//	否	Number	如：1234表示12.34%
        "是否有优惠券" => "hasCoupon",//	否	Boolean	设置为true表示该商品有优惠券，设置为false或不设置表示不判断这个属性
    ];
}