<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 活动商品
 */
class ActivityGoodsList extends DtkRequest
{
    public $version = 'v1.2.2';
    public $api = '/goods/activity/goods-list';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|pageId|String|是|分页id，默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口第一次返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入库商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）|
|pageSize|Number|否|每页条数，默认为100，大于100按100处理|
|activityId|Number|是|通过热门活动API获取的活动id|
|cid|Number|否|大淘客一级分类ID：1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺|
|subcid|Number|否|大淘客二级分类ID：可通过超级分类接口获取二级分类id，当同时传入一级分类id和二级分类id时，以一级分类id为准|
|freeshipRemoteDistrict|Number|否|偏远地区包邮：1.是，0.否|
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
|itemLink|String|https://detail.tmall.com/item.htm?id=589284195570|商品淘宝链接|
|title|String|“西维里男士睡衣夏季韩版真丝短袖丝绸薄款宽松青年冰丝家居服套装”|淘宝标题|
|dtitle|String|夏季睡衣男冰丝短袖丝绸家居服套装|大淘客短标题|
|desc|String|“宽松舒适，难以磨损典，雅而优美，倍感丝滑，质感优越，庄严而心仪，简约设计，色调清新脱俗，适合各种场合”|推广文案|
|cid|Number|10|商品在大淘客的分类id|
|subcid|List[Number]|[86369,90723]|商品在大淘客的二级分类id，该分类为前端分类，一个商品可能有多个二级分类id|
|tbcid|Number|50012772|商品在淘宝的分类id|
|mainPic|String|“img.alicdn.com/imgextra/i2/4014489195/O1CN01kYlVPs2HnMKYwLLRm_!!4014489195.jpg”|商品主图链接|
|marketingMainPic|String|“https://sr.ffquan.com/super_pic/o_1d6fpckjs1ii3h9dkibk9b7h38.jpg“|营销主图链接|
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
|couponConditions|String|38|优惠券使用条件|
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
|shopType|Number|1|店铺类型，1-天猫，0-淘宝|
|sellerId|String|4014489195|淘宝卖家id|
|shopName|String|“西维里旗舰店”|店铺名称|
|shopLevel|Number|11|淘宝店铺等级|
|descScore|Number|4.8|描述分|
|dsrScore|Number|4.8|描述相符|
|dsrPercent|Number|0.0|描述同行比|
|shipScore|Number|4.8|物流服务|
|shipPercent|Number|10.32|物流同行比|
|serviceScore|Number|4.8|服务态度|
|servicePercent|Number|5.82|服务同行比|
|hotPush|Number|456|热推值|
|teamName|String|“阿甘团队”|放单人名称|
|quanMLink|Number|10|定金，若无定金，则显示0|
|hzQuanOver|Number|100|立减，若无立减金额，则显示0|
|yunfeixian|Number|1|0.不包运费险 1.包运费险|
|estimateAmount|Number|25.2|预估淘礼金（预计10月20日上线）|
|shopLogo|String|https://img.alicdn.com/imgextra//59/df/TB1lJVxNFXXXXcoXFXXSutbFXXX.jpg|店铺logo|
|freeshipRemoteDistrict|Number|1|偏远地区包邮，0.不包邮，1.包邮|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time": 1554711897417,
    "code": 0,
    "msg": "成功",
    "data": {
        "list": [
            {
                "id": 21623438,
                "goodsId": "527388290525",
                "title": "南极人男士内裤男生平角裤衩纯棉潮流个性骚夏天透气薄款四角裤头",
                "dtitle": "南极人男士夏天平角透气个性内裤",
                "originalPrice": 49.9,
                "actualPrice": 29.9,
                "shopType": 1,
                "goldSellers": 0,
                "monthSales": 33448,
                "twoHoursSales": 0,
                "dailySales": 0,
                "commissionType": 3,
                "desc": "【南极人品牌】【4条装，赶紧抢】舒适面料，干爽透气，柔软有弹性，柔软亲肤，莫代尔，冰丝都有，轻薄透气，款式多，尺码全。透气性好，不闷热，洗了不褪色，手慢无【赠送运费险】",
                "couponReceiveNum": 0,
                "couponLink": "https://uland.taobao.com/quan/detail?sellerId=2430420260&activityId=9e40ea87fca441539820e2b22ad7f4bb",
                "couponEndTime": "2019-08-20 23:59:59",
                "couponStartTime": "2019-08-15 00:00:00",
                "couponPrice": 20,
                "couponConditions": "49",
                "activityType": 1,
                "createTime": "2019-08-14 15:29:08",
                "mainPic": "https://img.alicdn.com/imgextra/i3/4226848392/O1CN01WiDY5H2BraJxnJpp3_!!4226848392.jpg",
                "marketingMainPic": "https://sr.ffquan.cn/relate_pic/o_1di7gdeeb8s2fn1cfq1m5d1g90d.jpg",
                "sellerId": "2430420260",
                "cid": 10,
                "discounts": 0.6,
                "commissionRate": 20,
                "couponTotalNum": 100000,
                "haitao": 0,
                "activityStartTime": "",
                "activityEndTime": "",
                "shopName": "南极人双鸿专卖店",
                "shopLevel": 16,
                "descScore": 4.8,
                "brand": 1,
                "brandId": 107380,
                "brandName": "南极人",
                "hotPush": 0,
                "teamName": "德合联盟",
                "itemLink": "https://detail.tmall.com/item.htm?id=527388290525",
                "tchaoshi": 0,
                "detailPics": "",
                "dsrScore": -1,
                "dsrPercent": -1,
                "shipScore": -1,
                "shipPercent": -1,
                "serviceScore": -1,
                "servicePercent": -1,
                "subcid": [
                    97426
                ],
                "tbcid": 50008882,
                "quanMLink": 10,
                "hzQuanOver": 100,
                "yunfeixian": 1,
                "estimateAmount": 0,
                "shopLogo": "https://img.alicdn.com/imgextra//59/df/TB1lJVxNFXXXXcoXFXXSutbFXXX.jpg",
                "freeshipRemoteDistrict": 0
            }
        ],
        "totalNum": 16499,
        "pageId": "76679471048598b0"
    }
}
RESULTINFO;

}