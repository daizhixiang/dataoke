<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 我发布的商品
 */
class GetOwnerGoods extends DtkRequest
{
    public $version = 'v1.0.1';
    public $api = '/goods/get-owner-goods';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|pageId|String|是|分页id，默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）|
|pageSize|Number|是|每页条数，默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200|
|online|Number|否|是否下架，默认为1,1-未下架商品，0-已下架商品|
|startTime|Date|否|商品提交开始时间，请求格式：yyyy-MM-dd HH:mm:ss|
|endTime|Date|否|商品上架结束时间，请求格式：yyyy-MM-dd HH:mm:ss|
|sort|String|否|排序字段，默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|id|Number|18592060|商品id|
|goodsId|Number|521027319777|淘宝商品id|
|createTime|String|“2019-03-09 07:43:38”|上架时间|
|lowerShelfTime|String|“2019-03-09 11:43:29”|下架时间|
|refuseReason|String|券过期或失效,系统下架!!|拒绝理由/下架理由，无上架时间则是拒绝理由，有上架时间则是下架理由|
|consumptionCoupon|String|100|消费点券|
|userId|String|688412|用户id|
|note|String|“没有备注”|备注|
|shelfTime|Date|“2019-03-09T07:43:38”|提交时间|
|monthSales|Number|52358|销量|
|commissionRate|Number|20|佣金比例|
|couponReceiveNum|Number|3000|领券量|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time":1555643653208,
    "code":0,
    "msg":"成功",
    "data":{
        "list":[
            {
                "id":18592060,
                "goodsId":"521027319777",
                "createTime":"2019-03-09 07:43:38",
                "lowerShelfTime":"2019-03-09 11:43:29",
                "refuseReason":"券过期或失效,系统下架!!",
                "consumptionCoupon":"100",
                "userId":688412,
                "shelfTime":"2019-03-09T07:43:38",
                "monthSales":52358,
                "commissionRate":20,
                "couponReceiveNum":3000,
                "shelfStatus":0,
                "note":"没有备注"
            }
        ],
        "totalNum":827717,
        "pageId":"a8d37b91520348a0"
    }
}
RESULTINFO;

}