<?php


namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 单品详情
 */
class GetGoodsDetails extends DtkRequest
{
    public $version = 'v1.2.3';
    public $api = '/goods/get-goods-details';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|id|Number|是|大淘客商品id，请求时id或goodsId必填其中一个，若均填写，将优先查找当前单品id|
|goodsId|String|否|淘宝商品id，id或goodsId必填其中一个，若均填写，将优先查找当前单品id|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|id|Number|18926311|商品id,若查询结果id=-1，则说明该商品非大淘客平台商品，数据为淘宝直接返回的数据，由于淘宝数据的缓存时间相对较长，会出现商品信息和详情信息不一致的情况|
|goodsId|String|589284195570|淘宝商品id|
|itemLink|String|“https://detail.tmall.com/item.htm?id=589284195570“|商品淘宝链接|
|title|String|“西维里男士睡衣夏季韩版真丝短袖丝绸薄款宽松青年冰丝家居服套装”|淘宝标题|
|dtitle|String|“夏季睡衣男冰丝短袖丝绸家居服套装”|大淘客短标题|
|desc|String|“宽松舒适，难以磨损典，雅而优美，倍感丝滑，质感优越，庄严而心仪，简约设计，色调清新脱俗，适合各种场合”|推广文案|
|cid|String|10|商品在大淘客的分类id|
|subcid|List[Number]|[86369,90723]|商品在大淘客的二级分类id，该分类为前端分类，一个商品可能有多个二级分类id|
|tbcid|Number|50012772|商品在淘宝的分类id|
|mainPic|String|“//img.alicdn.com/imgextra/i2/4014489195/O1CN01kYlVPs2HnMKYwLLRm_!!4014489195.jpg”|商品主图链接|
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
|twoHoursSales|Number|50|2小时销量|
|dailySales|Number|58|当天销量|
|brand|Number|4|是否是品牌商品|
|brandId|Number|2301323020|品牌id|
|brandName|String|“西维里”|品牌名称|
|createTime|String|“2019-03-29 10:00:06”|商品上架时间|
|activityType|Number|1|活动类型，1-无活动，2-淘抢购，3-聚划算|
|activityStartTime|String|“2019-03-29 10:00:06”|活动开始时间|
|activityEndTime|String|“2019-04-29 10:00:06”|活动结束时间|
|shopType|Number|1|店铺类型，1-天猫，0-淘宝|
|goldSellers|Number|1|是否金牌卖家，1-金牌卖家，0-非金牌卖家|
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
|teamName|String|“啊甘团队”|放单人名称|
|detailPics|String|[{“img”: “//img.alicdn.com/imgextra/i2/2099112387/O1CN015iPsj11TVHwGWKgLO!!2099112387.jpg”}, {“img”: “//img.alicdn.com/imgextra/i2/2099112387/O1CN01JjrEDb1TVHvlYyOMQ!!2099112387.jpg”}]|商品详情图（需要做适配）|
|imgs|String|https://img.alicdn.com/imgextra/i4/2590392037/O1CN01K6CtTW1QuzNmFciPP_!!0-item_pic.jpg,https://img.alicdn.com/imgextra/i1/2590392037/O1CN01VrdHPH1QuzNQYaAMn_!!2590392037.jpg,https://img.alicdn.com/imgextra/i4/2590392037/O1CN01mV2lHH1QuzNhKYHGO_!!2590392037.jpg,https://img.alicdn.com/imgextra/i1/2590392037/O1CN01hxGFpY1QuzNGSjcBp_!!2590392037.jpg,https://img.alicdn.com/imgextra/i3/2590392037/O1CN01RXS1S91QuzNhVdHl9_!!2590392037.jpg|淘宝轮播图|
|reimgs|String|“img.alicdn.com/imgextra/i2/4014489195/O1CN01kYlVPs2HnMKYwLLRm_!!4014489195.jpg”|相关商品图|
|quanMLink|Number|10|定金，若无定金，则显示0|
|hzQuanOver|Number|100|立减，若无立减金额，则显示0|
|yunfeixian|Number|1|0.不包运费险 1.包运费险|
|estimateAmount|Number|25.2|预估淘礼金|
|shopLogo|String|https://img.alicdn.com/imgextra//59/df/TB1lJVxNFXXXXcoXFXXSutbFXXX.jpg|店铺logo|
|specialText|List|1|商品卖点|
|freeshipRemoteDistrict|Number|1|偏远地区包邮，0.不包邮，1.包邮|

RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time":1571298654642,
    "code":0,
    "msg":"成功",
    "data":{
        "id":22777171,
        "goodsId":"576997447689",
        "title":"麦德好果仁雪花酥网红零食小吃糕点休闲食品饼干整箱牛轧糖沙琪玛",
        "dtitle":"【麦德好】蔓越莓果仁雪花酥400g",
        "originalPrice":9.9,
        "actualPrice":6.9,
        "shopType":1,
        "goldSellers":0,
        "monthSales":49071,
        "twoHoursSales":6922,
        "dailySales":14713,
        "commissionType":3,
        "desc":"【买一送一共发400g】新西兰进口奶源，精选原材料手工制作，奶香味十足，酥脆爽口，甜而不腻，每一口都是好滋味【七天无理由退换，破损包退，赠运费险】",
        "couponReceiveNum":8000,
        "couponLink":"https://uland.taobao.com/quan/detail?sellerId=1791258654&activityId=c1ccb9f537ae4704aa27fbce96d8809e",
        "couponEndTime":"2019-10-19 23:59:59",
        "couponStartTime":"2019-10-17 00:00:00",
        "couponPrice":3,
        "couponConditions":"9",
        "activityType":3,
        "createTime":"2019-10-16 23:37:02",
        "mainPic":"https://img.alicdn.com/imgextra/i3/1791258654/O1CN01XRU1jH2Dna7Kan4Lj_!!1791258654.jpg",
        "marketingMainPic":"https://sr.ffquan.cn/relate_pic/o_1dnbluh3v1acepcvtae1l0kpd418.jpg",
        "sellerId":"1791258654",
        "cid":6,
        "discounts":0.7,
        "commissionRate":25,
        "couponTotalNum":100000,
        "haitao":0,
        "activityStartTime":"2019-10-17 10:00:00",
        "activityEndTime":"2019-10-20 08:59:59",
        "shopName":"食尚物语食品专营店",
        "shopLevel":20,
        "descScore":4.8,
        "brand":0,
        "brandId":31978674,
        "brandName":"麦德好",
        "hotPush":1001,
        "teamName":"牛犇-商盟",
        "itemLink":"https://detail.tmall.com/item.htm?id=576997447689",
        "tchaoshi":0,
        "detailPics":"//img.alicdn.com/imgextra/i3/1791258654/O1CN01Cy0yax2Dna3OlR1q8_!!1791258654.jpg,//img.alicdn.com/imgextra/i2/1791258654/O1CN01qrVtiZ2Dna74t1liN_!!1791258654.jpg,//img.alicdn.com/imgextra/i1/1791258654/O1CN013QFTJa2Dna70My64y_!!1791258654.jpg,//img.alicdn.com/imgextra/i1/1791258654/O1CN01VL9GjZ2Dna752iDix_!!1791258654.jpg,//img.alicdn.com/imgextra/i4/1791258654/O1CN010C2o1h2Dna76JYU8I_!!1791258654.jpg,//img.alicdn.com/imgextra/i2/1791258654/O1CN01zwZeqR2Dna75nXBSu_!!1791258654.jpg,//img.alicdn.com/imgextra/i1/1791258654/O1CN01oidoKY2Dna74JaBdB_!!1791258654.jpg,//img.alicdn.com/imgextra/i4/1791258654/O1CN01DECkeD2Dna7O0yemi_!!1791258654.jpg,//img.alicdn.com/imgextra/i3/1791258654/O1CN0132Lpqk2Dna7GxnEz3_!!1791258654.jpg,//img.alicdn.com/imgextra/i3/1791258654/O1CN01L3e0WO2Dna7Q7FHK9_!!1791258654.jpg",
        "dsrScore":4.8,
        "dsrPercent":17.17,
        "shipScore":4.8,
        "shipPercent":0,
        "serviceScore":4.8,
        "servicePercent":2.51,
        "subcid":[
            8395,
            90318
        ],
        "imgs":"https://img.alicdn.com/imgextra/i1/1791258654/O1CN01dbvK0R2Dna7Oofw0k_!!0-item_pic.jpg,https://img.alicdn.com/imgextra/i3/1791258654/O1CN01XRU1jH2Dna7Kan4Lj_!!1791258654.jpg,https://img.alicdn.com/imgextra/i1/1791258654/O1CN01h2wUZy2Dna7EzKNeL_!!1791258654.jpg,https://img.alicdn.com/imgextra/i2/1791258654/O1CN01kVLBAz2Dna7FDDVqS_!!1791258654.jpg,https://img.alicdn.com/imgextra/i4/1791258654/O1CN01uq8HT72Dna7NdRRq4_!!1791258654.png",
        "reimgs":"",
        "tbcid":50010513,
        "quanMLink":10,
        "hzQuanOver":100,
        "yunfeixian":1,
        "estimateAmount":0,
        "shopLogo":"https://img.alicdn.com/imgextra//59/df/TB1lJVxNFXXXXcoXFXXSutbFXXX.jpg",
        "freeshipRemoteDistrict":0
    }
}
RESULTINFO;

}