<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 商品列表
 */
class GetGoodsList extends DtkRequest
{
    public $version = 'v1.2.3';
    public $api = '/goods/get-goods-list';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|pageId|String|是|默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）|
|pageSize|Number|否|每页条数，默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200|
|sort|String|否|排序方式，默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高|
|cids|String|否|大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id|
|subcid|Number|否|大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id|
|specialId|Number|否|商品卖点，1.拍多件活动；2.多买多送；3.限量抢购；4.额外满减；6.买商品礼赠|
|juHuaSuan|Number|否|1-聚划算商品，0-所有商品，不填默认为0|
|taoQiangGou|Number|否|1-淘抢购商品，0-所有商品，不填默认为0|
|tmall|Number|否|1-天猫商品， 0-非天猫商品，不填默认所有商品|
|tchaoshi|Number|否|1-天猫超市商品， 0-所有商品，不填默认为0|
|goldSeller|Number|否|1-金牌卖家商品，0-所有商品，不填默认为0|
|haitao|Number|否|1-海淘商品， 0-所有商品，不填默认为0|
|pre|Number|否|1-预告商品，0-所有商品，不填默认为0|
|brand|Number|否|1-品牌商品，0-所有商品，不填默认为0|
|brandIds|Number|否|当brand传入0时，再传入brandIds可能无法获取结果。品牌id可以传多个，以英文逗号隔开，如：”345,321,323”|
|priceLowerLimit|Number|否|价格（券后价）下限|
|priceUpperLimit|Number|否|价格（券后价）上限|
|couponPriceLowerLimit|Number|否|最低优惠券面额|
|commissionRateLowerLimit|Number|否|最低佣金比率|
|monthSalesLowerLimit|Number|否|最低月销量|
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
|goodsId|String|“589284195570”|淘宝商品id|
|itemLink|String|“https://detail.tmall.com/item.htm?id=589284195570“|商品淘宝链接|
|title|String|“西维里男士睡衣夏季韩版真丝短袖丝绸薄款宽松青年冰丝家居服套装”|淘宝标题|
|dtitle|String|“夏季睡衣男冰丝短袖丝绸家居服套装”|大淘客短标题|
|desc|String|“宽松舒适，难以磨损典，雅而优美，倍感丝滑，质感优越，庄严而心仪，简约设计，色调清新脱俗，适合各种场合”|推广文案|
|cid|Number|10|商品在大淘客的分类id|
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
|couponReceiveNum|Number|5000|领券量|
|couponEndTime|String|“2019-04-08 23:59:59”|优惠券结束时间|
|couponStartTime|String|“2019-04-01 00:00:00”|优惠券开始时间|
|couponPrice|Number|10|优惠券金额|
|couponConditions|String|38|优惠券使用条件|
|monthSales|Number|1050|30天销量|
|twoHoursSales|Number|50|2小时销量|
|dailySales|Number|200|当日销量|
|brand|Number|4|是否是品牌商品|
|brandId|Number|2301323020|品牌id|
|brandName|String|“西维里”|品牌名称|
|createTime|String|“2019-03-29 10:00:06”|商品上架时间|
|activityType|Number|1|活动类型，1-无活动，2-淘抢购，3-聚划算|
|activityStartTime|String|“2019-03-29 10:00:06”|活动开始时间|
|activityEndTime|String|“2019-04-29 10:00:06”|活动结束时间|
|shopType|Number|1|店铺类型，1-天猫，0-淘宝|
|haitao|Number|1|是否海淘，1-海淘商品，0-非海淘商品|
|sellerId|String|4014489195|淘宝卖家id|
|shopName|String|“西维里旗舰店”|店铺名称|
|shopLevel|Number|11|淘宝店铺等级|
|descScore|Number|4.8|描述分|
|dsrScore|Number|4.8|描述相符|
|dsrPercent|Number|0.0|描述同行比|
|shipScore|Number|4.8|服务态度|
|shipPercent|Number|10.32|服务同行比|
|serviceScore|Number|4.8|物流服务|
|servicePercent|Number|5.82|物流同行比|
|hotPush|Number|544|热推值|
|teamName|String|“阿甘团队”|放单人名称|
|quanMLink|Number|10|定金，若无定金，则显示0|
|hzQuanOver|Number|100|立减，若无立减金额，则显示0|
|yunfeixian|Number|1|0.不包运费险 1.包运费险|
|estimateAmount|Number|25.5|预估淘礼金|
|shopLogo|String|https://img.alicdn.com/imgextra//59/df/TB1lJVxNFXXXXcoXFXXSutbFXXX.jpg|店铺logo|
|specialText|List|买一送一|特色文案 如：买一送一、第二件0元等|
|freeshipRemoteDistrict|Number|1|偏远地区包邮，1-包邮，0-否|
|goldSellers|Number|1|是否是金牌卖家，1-是，0-非金牌卖家|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "status":200,
    "data":{
        "time":1589008461246,
        "code":0,
        "msg":"成功",
        "data":{
            "list":[
                {
                    "id":26207869,
                    "goodsId":"588339707188",
                    "title":"【良品铺子麻辣零食大礼包】网红小吃整箱充饥夜宵休闲小食品一箱",
                    "dtitle":"【拍两件43.9】良品铺子麻辣零食大礼包",
                    "originalPrice":44.9,
                    "actualPrice":43.9,
                    "shopType":1,
                    "goldSellers":0,
                    "monthSales":239932,
                    "twoHoursSales":756,
                    "dailySales":6463,
                    "commissionType":3,
                    "desc":"【丰富-10大组合，每组15小包+；好口味-升级新品，火锅牛肉，网红柠檬鸡爪，烧烤鱿鱼串，款款不踩雷】",
                    "couponReceiveNum":4800,
                    "couponLink":"https://uland.taobao.com/quan/detail?sellerId=619123122&activityId=1db9973017914504be49c2f1ed04cdc3",
                    "couponEndTime":"2020-05-11 23:59:59",
                    "couponStartTime":"2020-05-09 00:00:00",
                    "couponPrice":1,
                    "couponConditions":"44",
                    "activityType":3,
                    "createTime":"2020-05-08 23:32:05",
                    "mainPic":"https://img.alicdn.com/imgextra/i2/619123122/O1CN01IFsYF71Yvv7FAGVX7_!!619123122-0-lubanu-s.jpg",
                    "marketingMainPic":"https://sr.ffquan.cn/dtk_user_fd/20200416/bqc2rokq57btoo4fepeg0.jpg",
                    "sellerId":"619123122",
                    "cid":6,
                    "discounts":0.98,
                    "commissionRate":15,
                    "couponTotalNum":40000,
                    "haitao":0,
                    "activityStartTime":"2020-05-09 10:00:00",
                    "activityEndTime":"2020-05-12 08:59:00",
                    "shopName":"良品铺子旗舰店",
                    "shopLevel":20,
                    "descScore":4.8,
                    "brand":1,
                    "brandId":7724367,
                    "brandName":"良品铺子",
                    "hotPush":2595,
                    "teamName":"极米电商",
                    "itemLink":"https://detail.tmall.com/item.htm?id=588339707188",
                    "tchaoshi":0,
                    "detailPics":"",
                    "dsrScore":4.8,
                    "dsrPercent":24.31,
                    "shipScore":4.8,
                    "shipPercent":12.79,
                    "serviceScore":4.8,
                    "servicePercent":15.86,
                    "subcid":[
                        8409,
                        116908,
                        116910
                    ],
                    "quanMLink":0,
                    "hzQuanOver":0,
                    "yunfeixian":0,
                    "estimateAmount":-1,
                    "shopLogo":"https://img.alicdn.com/imgextra//i1/619123122/O1CN011YvuzJWPCJpIVE2_!!619123122.png",
                    "specialText":[
                        "拍两件43.9"
                    ],
                    "freeshipRemoteDistrict":0,
                    "tbcid":50008618
                }
            ],
            "totalNum":102092,
            "pageId":"88000ab04649dff5"
        }
    },
    "msg":"请求成功"
}
RESULTINFO;

}