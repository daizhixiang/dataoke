<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 咚咚抢
 */
class CategoryDdqGoodsList extends DtkRequest
{
    public $version = 'v1.2.1';
    public $api = '/category/ddq-goods-list';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|roundTime|String|否|默认为当前场次，场次时间输入方式：yyyy-mm-dd hh:mm:ss|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|ddqTime|String|2019-12-10 08:00:00|场次时间|
|id|Number|18926311|商品id|
|goodsId|String|“589284195570”|淘宝商品id|
|itemLink|String|“https://detail.tmall.com/item.htm?id=589284195570“|商品淘宝链接|
|title|String|“西维里男士睡衣夏季韩版真丝短袖丝绸薄款宽松青年冰丝家居服套装”|淘宝标题|
|dtitle|String|“夏季睡衣男冰丝短袖丝绸家居服套装”|大淘客短标题|
|cid|Number|10|商品在大淘客的分类id|
|subcid|List[Number]|[86369,90723]|商品在大淘客的二级分类id，该分类为前端分类，一个商品可能有多个二级分类id|
|ddqDesc|String|除螨虫，更健康|咚咚抢商品标签|
|tbcid|Number|50012772|商品在淘宝的分类id|
|mainPic|String|“img.alicdn.com/imgextra/i2/4014489195/O1CN01kYlVPs2HnMKYwLLRm_!!4014489195.jpg”|商品主图链接|
|marketingMainPic|String|“https://sr.ffquan.com/super_pic/o_1d6fpckjs1ii3h9dkibk9b7h38.jpg“|营销主图链接（新加字段）|
|originalPrice|Number|38.5|商品原价|
|actualPrice|Number|28.5|券后价|
|discounts|Number|0.74|折扣力度|
|commissionType|Number|3|佣金类型，0-通用，1-定向，2-高佣，3-营销计划|
|commissionRate|Number|20|佣金比例|
|couponLink|String|“https://uland.taobao.com/quan/detail?sellerId=4014489195&activityId=df6c5ba6aa6d4f21a303b50cca2f4a45“|优惠券链接|
|couponTotalNum|Number|7000|券总量|
|couponReceiveNum|Number|1000|领券量|
|couponEndTime|String|“2019-04-08 23:59:59”|优惠券结束时间|
|couponStartTime|String|“2019-04-01 00:00:00”|优惠券开始时间|
|couponPrice|Number|10|优惠券金额|
|couponConditions|String|“38”|优惠券使用条件|
|monthSales|Number|1030|30天销量|
|twoHoursSales|Number|30|2小时销量|
|dailySales|Number|20|当日销量|
|brand|Number|4|是否是品牌商品|
|brandId|Number|2301323020|品牌id|
|brandName|String|“西维里”|品牌名称|
|createTime|String|“2019-03-29 10:00:06”|商品上架时间|
|activityType|Number|1|活动类型，1-无活动，2-淘抢购，3-聚划算|
|activityStartTime|String|“2019-03-29 10:00:06”|活动开始时间|
|activityEndTime|String|“2019-04-29 10:00:06”|活动结束时间|
|sellerId|String|“4014489195”|淘宝卖家id|
|shopName|String|“西维里旗舰店”|店铺名称|
|shopLevel|Number|11|淘宝店铺等级|
|quanMLink|Number|10|定金，若无定金，则显示0|
|hzQuanOver|Number|100|立减，若无立减金额，则显示0|
|yunfeixian复制|Number|1|0.不包运费险 1.包运费险|
|estimateAmount|Number|25.2|预估淘礼金|
|roundsList|List|1|场次列表|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time": 1575970678290,
    "code": 0,
    "msg": "成功",
    "data": {
        "ddqTime": "2019-12-10 08:00:00",
        "status": 0,
        "goodsList": [
            {
                "id": 23863945,
                "goodsId": "602524111820",
                "itemLink": "https://detail.tmall.com/item.htm?id=602524111820",
                "title": "志高电热毯双人电褥子双控调恒温单人安全家用水暖毯学生宿舍加大",
                "dtitle": "【志高】家用电热毯双控调温",
                "cid": 8,
                "subcid": [
                    113820
                ],
                "ddqDesc": "除螨虫，更健康",
                "mainPic": "https://img.alicdn.com/imgextra/i1/1754461448/O1CN01TdZDf71MZE4C5MFh3_!!1754461448.jpg",
                "originalPrice": 89,
                "actualPrice": 49,
                "couponPrice": 40,
                "discounts": 0.55,
                "couponLink": "https://uland.taobao.com/quan/detail?sellerId=2744899201&activityId=de6bee4431d24058a9314dc4f300a05a",
                "couponEndTime": "2019-12-11 23:59:59",
                "couponStartTime": "2019-12-10 00:00:00",
                "couponConditions": "89",
                "commissionType": 3,
                "commissionRate": 20,
                "createTime": "2019-12-09 16:14:19",
                "couponReceiveNum": 2000,
                "couponTotalNum": 100000,
                "monthSales": 45737,
                "activityType": 1,
                "activityStartTime": "",
                "activityEndTime": "",
                "shopName": "chigo志高鑫溶铭专卖店",
                "shopLevel": 14,
                "sellerId": "2744899201",
                "brand": 1,
                "brandId": 30664,
                "brandName": "志高",
                "twoHoursSales": 26,
                "dailySales": 26,
                "quanMLink": 0,
                "hzQuanOver": 0,
                "yunfeixian": 1,
                "estimateAmount": -1,
                "tbcid": 50000360
            }
        ],
        "roundsList": [
            {
                "ddqTime": "2019-12-10 08:00:00",
                "status": 0
            },
            {
                "ddqTime": "2019-12-10 10:00:00",
                "status": 1
            }
        ]
    }
}
RESULTINFO;

}