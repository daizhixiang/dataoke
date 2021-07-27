<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 大淘客搜索
 */
class GetDtkSearchGoods extends DtkRequest
{
    public $version = 'v2.1.2';
    public $api = '/goods/get-dtk-search-goods';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|pageSize|Number|是|每页条数，默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200|
|pageId|String|是|分页id，默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）|
|keyWords|String|是|关键词搜索|
|cids|String|否|大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id，一级分类id请求详情：1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺|
|subcid|Number|否|大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id|
|juHuaSuan|Number|否|是否聚划算，1-聚划算商品，0-所有商品，不填默认为0|
|taoQiangGou|Number|否|是否淘抢购，1-淘抢购商品，0-所有商品，不填默认为0|
|tmall|Number|否|是否天猫商品，1-天猫商品，0-非天猫商品，不填默认为所有商品|
|tchaoshi|Number|否|是否天猫超市商品，1-天猫超市商品，0-所有商品，不填默认为0|
|goldSeller|Number|否|是否金牌卖家，1-金牌卖家，0-所有商品，不填默认为0|
|haitao|Number|否|是否海淘商品，1-海淘商品，0-所有商品，不填默认为0|
|brand|Number|否|是否品牌商品，1-品牌商品，0-所有商品，不填默认为0|
|brandIds|String|否|品牌id，当brand传入0时，再传入brandIds将获取不到结果。品牌id可以传多个，以英文逗号隔开，如：”345,321,323”|
|priceLowerLimit|Number|否|价格（券后价）下限|
|priceUpperLimit|Number|否|价格（券后价）上限|
|couponPriceLowerLimit|Number|否|最低优惠券面额|
|commissionRateLowerLimit|Number|否|最低佣金比率|
|monthSalesLowerLimit|Number|否|最低月销量|
|sort|String|否|排序字段，默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高|
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
|title|String|“西维里男士睡衣夏季韩版真丝短袖丝绸薄款宽松青年冰丝家居服套装”|淘宝标题|
|dtitle|String|“夏季睡衣男冰丝短袖丝绸家居服套装”|短标题|
|originalPrice|Number|38.5|商品原价|
|actualPrice|Number|28.5|券后价|
|shopType|Number|1|店铺类型，1-天猫，0-淘宝|
|monthSales|Number|1000|30天销量|
|twoHoursSales|Number|50|2小时销量|
|dailySales|Number|656|当天销量|
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
|sellerId|String|4014489195|淘宝卖家id|
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
|shipScore|Number|4.8|物流服务|
|shipPercent|Number|10.32|物流同行比|
|serviceScore|Number|4.8|服务态度|
|servicePercent|Number|5.82|服务同行比|
|brand|Number|4|是否是品牌商品|
|brandId|Number|2301323020|品牌id|
|brandName|String|“西维里”|品牌名称|
|hotPush|Number|456|热推值|
|teamName|String|“啊甘团队”|放单人名称|
|itemLink|String|“https://detail.tmall.com/item.htm?id=589284195570“|商品淘宝链接|
|reimgs|Array|“img.alicdn.com/imgextra/i2/4014489195/O1CN01kYlVPs2HnMKYwLLRm_!!4014489195.jpg”|相关商品图|
|quanMLink|Number|10|定金，若无定金，则显示0|
|hzQuanOver|Number|100|立减，若无立减金额，则显示0|
|yunfeixian|Number|1|0.不包运费险 1.包运费险|
|estimateAmount|Number|25.2|预估淘礼金|
|freeshipRemoteDistrict|Number|1|偏远地区包邮，0.不包邮，1.包邮|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "status":200,
    "data":{
        "time":1589008908021,
        "code":0,
        "msg":"成功",
        "data":{
            "list":[
                {
                    "id":26146541,
                    "goodsId":"561427522238",
                    "title":"雪玲妃氨基酸洗面奶女男补水保湿控油深层清洁毛孔除螨洁面乳学生",
                    "dtitle":"【明星同款】氨基酸洗面奶500g大容量",
                    "originalPrice":49.9,
                    "actualPrice":39.9,
                    "shopType":1,
                    "goldSellers":0,
                    "monthSales":343825,
                    "twoHoursSales":1043,
                    "dailySales":1779,
                    "commissionType":3,
                    "desc":"【明星赵露思推荐】日本进口氨基酸，温和配方不刺激。敏感肌与孕妇都可以使用，同时里面添加烟酰胺成分，提亮肤色、减轻皮肤老化现象。一瓶抵五瓶，500g大容量。性价比超高。",
                    "couponReceiveNum":86000,
                    "couponLink":"https://uland.taobao.com/quan/detail?sellerId=1588446985&activityId=1ccd166bd0ae4d70a6944395cc828bd9",
                    "couponEndTime":"2020-05-15 23:59:59",
                    "couponStartTime":"2020-05-05 00:00:00",
                    "couponPrice":10,
                    "couponConditions":"49",
                    "activityType":1,
                    "createTime":"2020-05-06 15:58:09",
                    "mainPic":"https://img.alicdn.com/imgextra/i3/1588446985/O1CN01Q5RkUw21TB786kjKg_!!1588446985.jpg",
                    "marketingMainPic":"",
                    "sellerId":"1588446985",
                    "cid":3,
                    "discounts":0.8,
                    "commissionRate":20,
                    "couponTotalNum":100000,
                    "haitao":0,
                    "activityStartTime":"",
                    "activityEndTime":"",
                    "shopName":"雪玲妃旗舰店",
                    "shopLevel":18,
                    "descScore":4.8,
                    "brand":0,
                    "brandId":218756504,
                    "brandName":"雪玲妃",
                    "hotPush":110,
                    "teamName":"吃鸡联盟",
                    "itemLink":"https://detail.tmall.com/item.htm?id=561427522238",
                    "tchaoshi":0,
                    "detailPics":"",
                    "dsrScore":4.8,
                    "dsrPercent":4.7,
                    "shipScore":4.7,
                    "shipPercent":-1.22,
                    "serviceScore":4.7,
                    "servicePercent":-1.24,
                    "subcid":[
                        111749
                    ],
                    "quanMLink":0,
                    "hzQuanOver":0,
                    "yunfeixian":1,
                    "estimateAmount":-1,
                    "freeshipRemoteDistrict":1,
                    "tbcid":50011977
                }
            ],
            "totalNum":587,
            "pageId":"8ff77f0f38ac7a3c"
        }
    },
    "msg":"请求成功"
}
RESULTINFO;

}