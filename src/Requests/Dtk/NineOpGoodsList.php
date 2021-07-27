<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 9.9包邮精选
 */
class NineOpGoodsList extends DtkRequest
{
    public $version = 'v2.0.0';
    public $api = '/goods/nine/op-goods-list';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|pageSize|Number|是|每页条数：默认为20，最大值100|
|pageId|String|是|分页id：常规分页方式，请直接传入对应页码（比如：1,2,3……）|
|nineCid|String|是|9.9精选的类目id，分类id请求详情：-1-精选，1 -5.9元区，2 -9.9元区，3 -19.9元区（调整字段）|
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
|couponConditions|String|“38”|优惠券使用条件|
|activityType|Number|1|活动类型，1-无活动，2-淘抢购，3-聚划算|
|createTime|String|“2019-03-29 10:00:06”|商品上架时间|
|mainPic|String|“//img.alicdn.com/imgextra/i2/4014489195/O1CN01kYlVPs2HnMKYwLLRm_!!4014489195.jpg”|商品主图链接|
|marketingMainPic|String|“https://sr.ffquan.com/super_pic/o_1d6fpckjs1ii3h9dkibk9b7h38.jpg“|营销主图链接|
|video|String|https://cloud.video.taobao.com/play/u/2207496467885/p/2/e/6/t/1/258482478529.mp4?appKey=38829|商品视频（新增字段）|
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
|dsrScore|Number|4.8|描述相符||
|dsrPercent|Number|0.0|描述同行比|
|shipScore|Number|4.8|物流服务|
|shipPercent|Number|10.32|物流同行比|
|serviceScore|Number|4.8|服务态度|
|servicePercent|Number|5.82|服务同行比|
|brand|Number|1|是否是品牌商品|
|brandId|Number|34405660|品牌id|
|brandName|String|“西维里”|品牌名称|
|hotPush|Number|456|热推值|
|teamName|String|“啊甘团队”|放单人名称|
|itemLink|String|“https://detail.tmall.com/item.htm?id=589284195570“|商品淘宝链接|
|nineCid|Number|8|精选分类|
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
        "time":1588993197321,
        "code":0,
        "msg":"成功",
        "data":{
            "list":[
                {
                    "id":26212927,
                    "goodsId":"566274514615",
                    "title":"日式室内家用软底拖鞋浴室洗澡防滑情侣外穿凉拖鞋女夏季男家居鞋",
                    "dtitle":"【百万好评】居家浴室防滑软底拖鞋",
                    "originalPrice":5.9,
                    "actualPrice":4.9,
                    "shopType":0,
                    "goldSellers":1,
                    "monthSales":800000,
                    "twoHoursSales":0,
                    "dailySales":0,
                    "commissionType":3,
                    "desc":"100万好评！全家都能穿！！只需4.9元！！男女款都贼靓，看的我心里忒喜欢，赶紧往家抱两双！超市售价至少15.9元，全家的拖鞋一次采购齐全！",
                    "couponReceiveNum":2400,
                    "couponLink":"https://uland.taobao.com/quan/detail?sellerId=849090736&activityId=fa0aef34aa2c44779745456d98b2ba48",
                    "couponEndTime":"2020-05-10 23:59:59",
                    "couponStartTime":"2020-05-07 00:00:00",
                    "couponPrice":1,
                    "couponConditions":"5",
                    "activityType":1,
                    "createTime":"2020-05-09 10:31:21",
                    "mainPic":"https://img.alicdn.com/imgextra/i4/2206368566482/O1CN01QSzfZ31xknssZlNH8_!!2206368566482.jpg",
                    "marketingMainPic":"https://sr.ffquan.cn/dtk_user_fd/20200226/bpb3uusq57brvt58slp00.jpg",
                    "sellerId":"849090736",
                    "cid":4,
                    "discounts":0.83,
                    "commissionRate":20,
                    "couponTotalNum":82400,
                    "haitao":0,
                    "activityStartTime":"",
                    "activityEndTime":"",
                    "shopName":"集美日用家居商城",
                    "shopLevel":20,
                    "descScore":4.7,
                    "brand":0,
                    "brandId":3579236,
                    "brandName":"",
                    "hotPush":0,
                    "teamName":"渔夫联盟",
                    "itemLink":"https://detail.tmall.com/item.htm?id=566274514615",
                    "tchaoshi":0,
                    "detailPics":"",
                    "dsrScore":4.7,
                    "dsrPercent":-0.53,
                    "shipScore":4.8,
                    "shipPercent":0.4,
                    "serviceScore":4.8,
                    "servicePercent":0.37,
                    "subcid":[

                    ],
                    "nineCid":1,
                    "quanMLink":0,
                    "hzQuanOver":0,
                    "yunfeixian":0,
                    "estimateAmount":-1,
                    "freeshipRemoteDistrict":0,
                    "tbcid":50025847
                }
            ],
            "totalNum":8447,
            "pageId":"54993ddcec9fbf0d"
        }
    },
    "msg":"请求成功"
}
RESULTINFO;

}