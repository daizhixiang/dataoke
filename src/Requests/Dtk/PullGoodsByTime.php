<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 定时拉取
 */
class PullGoodsByTime extends DtkRequest
{
    public $version = 'v1.2.3';
    public $api = '/goods/pull-goods-by-time';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|pageSize|Number|否|每页条数，默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200|
|pageId|String|是|分页id，默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）|
|cid|String|否|大淘客的一级分类id。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id|
|subcid|Number|否|大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id|
|pre|Number|否|是否预告商品，1-预告商品，0-所有商品，不填默认为0|
|sort|String|否|排序方式，默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高|
|startTime|String|否|开始时间，格式为yy-mm-dd hh:mm:ss，商品下架的时间大于等于开始时间|
|endTime|String|否|结束时间，默认为请求的时间，商品下架的时间小于等于结束时间|
|freeshipRemoteDistrict|Number|否|偏远地区包邮，1-是，0-非偏远地区，不填默认所有商品|
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
|itemLink|String|“https://detail.tmall.com/item.htm?id=589284195570“|商品淘宝链接|
|title|String|“西维里男士睡衣夏季韩版真丝短袖丝绸薄款宽松青年冰丝家居服套装”|淘宝标题|
|dtitle|String|“夏季睡衣男冰丝短袖丝绸家居服套装”|短标题|
|desc|String|“宽松舒适，难以磨损典，雅而优美，倍感丝滑，质感优越，庄严而心仪，简约设计，色调清新脱俗，适合各种场合”|推广文案|
|cid|Number|10|商品在大淘客的分类id，1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺|
|subcid|List[Number]|[86369,90723]|商品在大淘客的二级分类id，该分类为前端分类，一个商品可能有多个二级分类id|
|tbcid|Number|50012772|商品在淘宝的分类id|
|mainPic|String|“img.alicdn.com/imgextra/i2/4014489195/O1CN01kYlVPs2HnMKYwLLRm_!!4014489195.jpg”|商品主图链接|
|marketingMainPic|String|“https://sr.ffquan.com/super_pic/o_1d6fpckjs1ii3h9dkibk9b7h38.jpg“|营销主图链接|
|video|String|https://cloud.video.taobao.com/play/u/2207496467885/p/2/e/6/t/1/258482478529.mp4?appKey=38829|商品视频（新增字段）|
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
|twoHoursSales|Number|35|2小时销量|
|dailySales|Number|258|当天销量|
|brand|Number|1|是否是品牌商品，0-不是品牌商品，1-是品牌商品|
|brandId|Number|2301323020|品牌id|
|brandName|String|“西维里”|品牌名称|
|createTime|String|“2019-03-29 10:00:06”|商品上架时间|
|shopType|Number|1|店铺类型，1-天猫，0-淘宝|
|activityType|Number|1|活动类型，1-无活动，2-淘抢购，3-聚划算|
|activityStartTime|String|“2019-03-29 10:00:06”|活动开始时间|
|activityEndTime|String|“2019-04-29 10:00:06”|活动结束时间|
|sellerId|String|“4014489195”|淘宝卖家id|
|shopName|String|“西维里旗舰店”|店铺名称|
|shopLevel|Number|12|淘宝店铺等级|
|descScore|Number|4.8|描述分|
|dsrScore|Number|4.8|描述相符|
|dsrPercent|Number|0.0|描述同行比|
|shipScore|Number|4.8|服务态度|
|shipPercent|Number|10.32|服务同行比|
|serviceScore|Number|4.8|物流服务|
|servicePercent|Number|5.82|物流同行比|
|hotPush|Number|456|热推值|
|teamName|String|“啊甘团队”|放单人名称|
|quanMLink|Number|10|定金，若无定金，则显示0|
|hzQuanOver|Number|100|立减，若无立减金额，则显示0|
|yunfeixian|Number|1|0.不包运费险 1.包运费险|
|estimateAmount|Number|25.2|预估淘礼金|
|shopLogo|String|https://img.alicdn.com/imgextra//59/df/TB1lJVxNFXXXXcoXFXXSutbFXXX.jpg|店铺logo|
|freeshipRemoteDistrict|Number|1|偏远地区包邮，0.不包邮，1.包邮|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time":1554711897417,
    "code":0,
    "msg":"成功",
    "data":{
        "list":[
            {
                "id":21631667,
                "goodsId":"599287662104",
                "title":"稻香村月饼广式蛋黄莲蓉豆沙散装多口味中秋送礼品团购尝鲜装礼盒",
                "dtitle":"【稻香村】9饼9味广式中秋月饼",
                "originalPrice":24.9,
                "actualPrice":14.9,
                "shopType":1,
                "goldSellers":0,
                "monthSales":229734,
                "twoHoursSales":1675,
                "dailySales":281,
                "commissionType":3,
                "desc":"【爆款返】【中华老字号，中国驰名商标，传承百年工艺】【聚划算44.9元。拍下立减20元。领10元券。到手价14.9元·】中秋月饼提前“购”，稻花千里，臻品世香，百年传承，九种口味，甜而不腻，口口酥软~",
                "couponReceiveNum":0,
                "couponLink":"https://uland.taobao.com/quan/detail?sellerId=2935830269&activityId=fa1211336e194e81b0586e5d1bf38e17",
                "couponEndTime":"2019-08-15 23:59:59",
                "couponStartTime":"2019-08-15 00:00:00",
                "couponPrice":10,
                "couponConditions":"20",
                "activityType":3,
                "createTime":"2019-08-15 00:08:03",
                "mainPic":"https://img.alicdn.com/imgextra/i2/2531211011/O1CN01R4Wxsc1JL4yRWh8Jj_!!2531211011.png",
                "marketingMainPic":"https://sr.ffquan.cn/relate_pic/o_1di0mofb21nb2lqfkc51gv1n2cd.jpg",
                "sellerId":"2935830269",
                "cid":6,
                "discounts":0.6,
                "commissionRate":30,
                "couponTotalNum":100000,
                "haitao":0,
                "activityStartTime":"2019-08-14 10:00:00",
                "activityEndTime":"2019-08-17 08:59:59",
                "shopName":"稻香村星皓专卖店",
                "shopLevel":15,
                "descScore":4.8,
                "brand":1,
                "brandId":92540,
                "brandName":"稻香村",
                "hotPush":51,
                "teamName":"文案工会",
                "itemLink":"https://detail.tmall.com/item.htm?id=599287662104",
                "tchaoshi":0,
                "detailPics":"",
                "dsrScore":-1,
                "dsrPercent":-1,
                "shipScore":-1,
                "shipPercent":-1,
                "serviceScore":-1,
                "servicePercent":-1,
                "subcid":[
                    8738,
                    90936
                ],
                "tbcid":50008062,
                "quanMLink":10,
                "hzQuanOver":100,
                "yunfeixian":1,
                "estimateAmount":0,
                "shopLogo":"https://img.alicdn.com/imgextra//59/df/TB1lJVxNFXXXXcoXFXXSutbFXXX.jpg",
                "freeshipRemoteDistrict":0
            }
        ],
        "totalNum":16499,
        "pageId":"76679471048598b0"
    }
}
RESULTINFO;

}