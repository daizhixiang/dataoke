<?php


namespace Requests\Dtk;

use Requests\DtkRequest;
/**
 * 联盟搜索
 */
class GetTbService extends DtkRequest
{
    public $version = 'v2.0.0';
    public $apiLink = 'https://openapi.dataoke.com/api/tb-service/get-tb-service';
    public $extraParasField = [
        "pageNo",//第几页	是	Number	默认1
        "pageSize",//每页条数	是	Number	页大小， 默认20，范围值1~100
        "keyWords",//查询词	是	String	查询词不能为空
        "sort",//排序	否	String	排序指标：销量（total_sales），淘客佣金比率（tk_rate）， 累计推广量（tk_total_sales），总支出佣金（tk_total_commi），价格（price）,排序方式：排序_des（降序），排序_asc（升序）,示例：升序查询销量：total_sales_asc
        "source",//是否商城商品	否	Number	设置为1表示该商品是属于淘宝商城商品，设置为非1或不设置表示不判断这个属性（和overseas字段冲突，若已请求source，请勿再请求overseas）
        "overseas",//是否海外商品	否	Number	是否海外商品，设置为1表示该商品是属于海外商品，设置为非1或不设置表示不判断这个属性（和source字段冲突，若已请求overseas，请勿再请求source）
        "endPrice",//折扣价范围上限	否	Number	单位：元
        "startPrice",//折扣价范围下限	否	Number	单位：元
        "startTkRate",//媒体淘客佣金比率下限	否	Number	如：1234表示12.34%
        "endTkRate",//商品筛选-淘客佣金比率上限	否	Number	如：1234表示12.34%
        "hasCoupon",//是否有优惠券	否	Boolean	设置为true表示该商品有优惠券，设置为false或不设置表示不判断这个属性
    ];
}