<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 商品更新
 */
class GetNewestGoods extends DtkRequest
{
    public $version = 'v1.1.0';
    public $api = '/goods/get-newest-goods';

    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|pageId|String|是|分页id，默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）|
|pageSize|Number|是|每页条数，默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200|
|startTime|Date|否|商品上架开始时间，请求格式：yyyy-MM-dd HH:mm:ss|
|endTime|Date|否|商品上架结束时间，请求格式：yyyy-MM-dd HH:mm:ss|
|cids|String|否|大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id，1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺|
|subcid|Number|否|大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id|
|juHuaSuan|Number|否|1-聚划算商品，0-所有商品，不填默认为0|
|taoQiangGou|Number|否|1-淘抢购商品，0-所有商品，不填默认为0|
|tmall|Number|否|1-天猫商品，0-非天猫商品，不填默认全部商品|
|tchaoshi|Number|否|1-天猫超市商品，0-所有商品，不填默认为0|
|goldSeller|Number|否|1-金牌卖家，0-所有商品，不填默认为0|
|haitao|Number|否|1-海淘，0-所有商品，不填默认为0|
|brand|Number|否|1-品牌，0-所有商品，不填默认为0|
|brandIds|String|否|品牌id，当brand传入0时，再传入brandIds将获取不到结果。品牌id可以传多个，以英文逗号隔开，如：”345,321,323”|
|priceLowerLimit|Number|否|价格（券后价）下限|
|priceUpperLimit|Number|否|价格（券后价）上限|
|couponPriceLowerLimit|Number|否|最低优惠券面额|
|commissionRateLowerLimit|Number|否|最低佣金比率|
|monthSalesLowerLimit|Number|否|最低月销量|
|sort|String|否|排序字段，默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|id|Number|19006425|商品id|
|goodsId|String|“579154850367”|淘宝商品id|
|originalPrice|Number|59|原价|
|actualPrice|Number|39|实际价格|
|couponPrice|Number|20|券金额|
|discounts|Number|0.66|折扣力度|
|commissionType|Number|3|佣金类型， 0-通用 ，1- 定向，2-高佣，3-营销计划|
|commissionRate|Number|30|佣金比率|
|monthSales|Number|4861|30天销量|
|hotPush|Number|7|热推值|
|subcid|List[Number]|[86369,90723]|商品在大淘客的二级分类id，该分类为前端分类，一个商品可能有多个二级分类id|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time":1554971857451,
    "code":0,
    "msg":"成功",
    "data":{
        "list":[
            {
                "id":21631667,
                "goodsId":"599287662104",
                "originalPrice":24.9,
                "actualPrice":14.9,
                "monthSales":229734,
                "twoHoursSales":1675,
                "dailySales":281,
                "commissionType":3,
                "couponReceiveNum":0,
                "couponPrice":10,
                "discounts":0.6,
                "commissionRate":30,
                "hotPush":51,
                "subcid":[
                    8738,
                    90936
                ]
            }
        ],
        "totalNum":20069,
        "pageId":"bcc699f1fc4ecaf5"
    }
}
RESULTINFO;

}