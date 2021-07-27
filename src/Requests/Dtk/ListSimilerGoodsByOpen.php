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
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|id|Number|是|大淘客的商品id|
|size|Number|否|每页条数，默认10 ， 最大值100|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|id|Number|18926311|商品id|
|goodsId|String|589284195570|淘宝商品id|
|title|String|“西维里男士睡衣夏季韩版真丝短袖丝绸薄款宽松青年冰丝家居服套装”|淘宝标题|
|dtitle|String|“夏季睡衣男冰丝短袖丝绸家居服套装”|短标题|
|originalPrice|Number|38.5|商品原价|
|actualPrice|Number|28.5|券后价|
|shopType|Number|1|店铺类型，1-天猫，0-淘宝|
|monthSales|Number|1030|30天销量|
|twoHoursSales|Number|30|2小时销量|
|dailySales|Number|886|当天销量|
|commissionType|Number|3|佣金类型，0-通用，1-定向，2-高佣，3-营销计划|
|desc|String|“宽松舒适，难以磨损典，雅而优美，倍感丝滑，质感优越，庄严而心仪，简约设计，色调清新脱俗，适合各种场合”|推广文案|
|couponReceiveNum|Number|1000|领券量|
|couponLink|String|“https://uland.taobao.com/quan/detail?sellerId=4014489195&activityId=df6c5ba6aa6d4f21a303b50cca2f4a45“|优惠券链接|
|couponEndTime|String|“2019-04-08 23:59:59”|优惠券结束时间|
|couponStartTime|String|“2019-04-01 00:00:00”|优惠券开始时间|
|couponPrice|Number|10|优惠券金额|
|couponConditions|String|38|优惠券使用条件|
|activityType|Number|1|活动类型，1-无活动，2-淘抢购，3-聚划算|
|createTime|String|“2019-03-29 10:00:06”|商品上架时间|
|mainPic|String|“//img.alicdn.com/imgextra/i2/4014489195/O1CN01kYlVPs2HnMKYwLLRm_!!4014489195.jpg”|商品主图链接|
|marketingMainPic|String|“https://sr.ffquan.com/super_pic/o_1d6fpckjs1ii3h9dkibk9b7h38.jpg“|营销主图链接|
|sellerId|String|“4014489195”|淘宝卖家id|
|cid|Number|10|商品在大淘客的分类id|
|subcid|List[Number]|[86369,90723]|商品在大淘客的二级分类id，该分类为前端分类，一个商品可能有多个二级分类id|
|tbcid|Number|50012772|商品在淘宝的分类id|
|discounts|Number|0.74|折扣力度|
|commissionRate|Number|20|佣金比例|
|couponTotalNum|Number|7000|券总量|
|activityStartTime|String|“2019-03-29 10:00:06”|活动开始时间|
|activityEndTime|String|“2019-04-29 10:00:06”|活动结束时间|
|shopName|String|“西维里旗舰店”|店铺名称|
|shopLevel|Number|11|淘宝店铺等级|
|descScore|Number|4.8|描述分|
|dsrScore|Number|4.8|描述相符|
|dsrPercent|Number|0.0|描述同行比|
|shipScore|Number|4.8|服务态度|
|shipPercent|Number|10.32|服务同行比|
|serviceScore|Number|4.8|物流服务|
|servicePercent|Number|5.82|物流同行比|
|brand|Number|4|是否是品牌商品|
|brandId|Number|2301323020|品牌id|
|brandName|String|“西维里”|品牌名称|
|hotPush|Number|456|热推值|
|teamName|String|“啊甘团队”|放单人名称|
|itemLink|String|“https://detail.tmall.com/item.htm?id=589284195570“|商品淘宝链接|
|quanMLink|Number|10|定金，若无定金，则显示0|
|hzQuanOver|Number|100|立减，若无立减金额，则显示0|
|yunfeixian复制|Number|1|0.不包运费险 1.包运费险|
|estimateAmount|Number|25.2|预估淘礼金|
|freeshipRemoteDistrict|Number|1|偏远地区包邮，0.不包邮，1.包邮|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time":1555400012796,
    "code":0,
    "msg":"成功",
    "data":{
        "list":[
            {
                "id":20140409,
                "goodsId":"592823281538",
                "title":"耶子夏季透气走秀款老爹鞋网布鞋飞织运动鞋男鞋运动鞋四季款ins2",
                "dtitle":"夏季透气网布鞋飞织男鞋运动鞋",
                "originalPrice":609,
                "actualPrice":109,
                "shopType":1,
                "goldSellers":0,
                "monthSales":216,
                "twoHoursSales":0,
                "dailySales":0,
                "commissionType":3,
                "desc":"超火、高颜值，全网面，透气，帅气侧漏！舒适不闷脚，聚力回弹，减震缓震，按摩级舒适脚感，享受夏天清透运动~",
                "couponReceiveNum":2,
                "couponLink":"https://uland.taobao.com/quan/detail?sellerId=2200827132125&activityId=5b5ddf1a90ff465189727050a60b19d4",
                "couponEndTime":"2019-06-12 07:59:59",
                "couponStartTime":"2019-06-04 08:00:00",
                "couponPrice":500,
                "couponConditions":"580",
                "couponId":"5b5ddf1a90ff465189727050a60b19d4",
                "activityType":1,
                "createTime":"2019-06-03 23:37:25",
                "mainPic":"//img.alicdn.com/imgextra/i3/2200827132125/O1CN017a23gD1RZIATh0rfM_!!2200827132125.jpg",
                "marketingMainPic":"",
                "sellerId":"2200827132125",
                "cid":5,
                "discounts":0.18,
                "commissionRate":20,
                "couponTotalNum":50000,
                "haitao":0,
                "activityStartTime":"",
                "activityEndTime":"",
                "shopName":"kzom旗舰店",
                "shopLevel":9,
                "descScore":4.9,
                "brand":0,
                "brandId":1586063976,
                "brandName":"",
                "hotPush":0,
                "teamName":"火星联盟",
                "itemLink":"https://detail.tmall.com/item.htm?id=592823281538",
                "tchaoshi":0,
                "dsrScore":4.8,
                "dsrPercent":0,
                "shipScore":4.8,
                "shipPercent":10.32,
                "serviceScore":4.8,
                "servicePercent":5.82,
                "subcid":[
                    86369,
                    90723
                ],
                "tbcid":50012906,
                "quanMLink":10,
                "hzQuanOver":100,
                "yunfeixian":1,
                "estimateAmount":0,
                "freeshipRemoteDistrict":1
            }
        ],
        "totalNum":1558,
        "pageId":"aa99bc38153f7fb1"
    }
}
RESULTINFO;

}