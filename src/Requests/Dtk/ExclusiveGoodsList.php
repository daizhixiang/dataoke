<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 大淘客独家券商品
 */
class ExclusiveGoodsList extends DtkRequest
{
    public $version = 'v1.0.0';
    public $api = '/goods/exclusive-goods-list';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|pageId|String|是|分页id：常规分页方式，请直接传入对应页码（比如：1,2,3……）|
|pageSize|Number|是|每页返回条数，每页条数支持输入10,20，50,100。默认50条|
|sort|String|否|排序方式，默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高|
|cids|String|否|大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺。不填默认全部|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|id|Number|18926311|商品id|
|goodsId|String|“589284195570”|淘宝商品id|
|itemLink|String|“https://detail.tmall.com/item.htm?id=589284195570“|商品淘宝链接|
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
|specialText|List|买一送一|特色文案（商品卖点）|
|couponReceiveNum|Number|1000|领券量|
|couponLink|String|“https://uland.taobao.com/quan/detail?sellerId=4014489195&activityId=df6c5ba6aa6d4f21a303b50cca2f4a45“|优惠券链接|
|couponEndTime|String|“2019-04-08 23:59:59”|优惠券结束时间|
|couponStartTime|String|“2019-04-01 00:00:00”|优惠券开始时间|
|couponPrice|Number|10|优惠券金额|
|couponConditions|String|“38”|优惠券使用条件|
|activityType|Number|1|活动类型，1-无活动，2-淘抢购，3-聚划算|
|createTime|String|“2019-03-29 10:00:06”|商品上架时间|
|mainPic|String|“//img.alicdn.com/imgextra/i2/4014489195/O1CN01kYlVPs2HnMKYwLLRm_!!4014489195.jpg”|商品主图链接|
|marketingMainPic|String|“https://sr.ffquan.com/super_pic/o_1d6fpckjs1ii3h9dkibk9b7h38.jpg“|营销主图链接|
|video|String|https://cloud.video.taobao.com/play/u/2207496467885/p/2/e/6/t/1/258482478529.mp4?appKey=38829|商品视频|
|sellerId|String|“4014489195”|淘宝卖家id|
|cid|Number|10|商品在大淘客的分类id|
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
|dsrPercent|Number|0|描述同行比|
|shipScore|Number|4.8|物流服务|
|shipPercent|Number|10.32|物流同行比|
|serviceScore|Number|4.8|服务态度|
|servicePercent|Number|5.82|服务同行比|
|brand|Number|1|是否是品牌商品|
|brandId|Number|34405660|品牌id|
|brandName|String|“西维里”|品牌名称|
|hotPush|Number|456|热推值|
|teamName|String|“啊甘团队”|放单人名称|
|quanMLink|Number|10|定金，若无定金，则显示0|
|hzQuanOver|Number|100|立减，若无立减金额，则显示0|
|yunfeixian|Number|1|0.不包运费险 1.包运费险|
|estimateAmount|Number|25.2|预估淘礼金|
|tchaoshi|Number|否|1-天猫超市商品， 0-所有商品，不填默认为0|
|goldSellers|Number|1|是否是金牌卖家，1-是，0-非金牌卖家|
|freeshipRemoteDistrict|Number|1|偏远地区包邮，0.不包邮，1.包邮|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time":1599458382024,
    "code":0,
    "msg":"成功",
    "data":{
        "list":[
            {
                "id":28763821,
                "goodsId":"45891821150",
                "title":"【京都念慈庵】新靓声宝礼盒 四味同糖喉糖礼盒 教师节礼物礼品",
                "dtitle":"【京都念慈庵】进口枇杷润喉糖礼盒装",
                "originalPrice":99,
                "actualPrice":69,
                "shopType":1,
                "goldSellers":0,
                "monthSales":4702,
                "twoHoursSales":274,
                "dailySales":2594,
                "commissionType":3,
                "desc":"【教师节送礼优选】【京都念慈菴旗舰店】草本传承，甘润养声，凝聚多种草本精华，有效缓解咽喉不适，洋溢着新鲜水果气息，还能清新口气，高级定制手绘礼盒4盒装，有手提袋。2种礼盒可选。送礼的至臻选择！",
                "couponReceiveNum":17000,
                "couponLink":"https://uland.taobao.com/quan/detail?sellerId=2127030673&activityId=e6cf0806ac2b4fd5b442a5c5a21d8b2b",
                "couponEndTime":"2020-09-07 23:59:59",
                "couponStartTime":"2020-09-01 00:00:00",
                "couponPrice":30,
                "couponConditions":"99",
                "activityType":1,
                "createTime":"2020-08-31 20:55:09",
                "mainPic":"https://img.alicdn.com/imgextra/i3/292438365/O1CN01GjGGCl2BfDi36ZGIm_!!292438365.jpg",
                "marketingMainPic":"https://sr.ffquan.cn/dtk_www/20200814/bsr7vc4q57br3hc0rk9g0.jpg",
                "sellerId":"2127030673",
                "cid":6,
                "discounts":0.3,
                "commissionRate":20.01,
                "couponTotalNum":100000,
                "activityStartTime":"",
                "activityEndTime":"",
                "shopName":"京都念慈庵旗舰店",
                "shopLevel":15,
                "descScore":4.9,
                "brand":0,
                "brandId":3229833,
                "brandName":"京都念慈菴",
                "hotPush":872,
                "teamName":"七匹狼精品联盟",
                "itemLink":"https://detail.tmall.com/item.htm?id=45891821150",
                "tchaoshi":0,
                "dsrScore":4.9,
                "dsrPercent":63.27,
                "shipScore":4.9,
                "shipPercent":54.04,
                "serviceScore":4.9,
                "servicePercent":57.57,
                "subcid":[
                    8409,
                    116909
                ],
                "video":"https://cloud.video.taobao.com/play/u/2127030673/p/2/e/6/t/1/271341637157.mp4?appKey=38829",
                "quanMLink":0,
                "hzQuanOver":0,
                "yunfeixian":0,
                "estimateAmount":0,
                "freeshipRemoteDistrict":0,
                "specialText":[

                ],
                "tbcid":50008056
            }
        ],
        "totalNum":81,
        "pageId":"0c77dcc68110f8ab"
    }
}
RESULTINFO;

}