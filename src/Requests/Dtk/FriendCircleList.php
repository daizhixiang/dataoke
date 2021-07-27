<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 朋友圈文案
 */
class FriendCircleList extends DtkRequest
{
    public $version = 'v1.3.0';
    public $api = '/goods/friends-circle-list';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|pageSize|Number|否|每页条数，默认为100，若小于10，则按10条处理，每页条数仅支持输入10,50,100|
|pageId|String|是|分页id，默认为1，支持传统的页码分页方式|
|sort|String|否|排序方式，默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高|
|cids|String|否|大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：|
|subcid|String|否|大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id|
|pre|Number|否|是否预告商品，1-预告商品，0-所有商品，不填默认为0|
|freeshipRemoteDistrict|Number|否|偏远地区包邮，1-是，0-非偏远地区，不填默认所有商品|
|goodsId|Number|否|大淘客id或淘宝id，查询单个商品是否有朋友圈文案，如果有，则返回商品信息及朋友圈文案，如果没有，显示10006错误|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
| id|Number|18926311|商品id|
|goodsId|String|589284195570|淘宝商品id|
|itemLink|String|https://detail.tmall.com/item.htm?id=589284195570|淘宝商品链接|
|title|String|西维里男士睡衣夏季韩版真丝短袖丝绸薄款宽松青年冰丝家居服套装|淘宝标题|
|dtitle|String|夏季睡衣男冰丝短袖丝绸家居服套装|大淘客短标题|
|desc|String|宽松舒适，难以磨损典，雅而优美，倍感丝滑，质感优越，庄严而心仪，简约设计，色调清新脱俗，适合各种场合|推广文案|
|cid|Number|10|商品在大淘客的分类id|
|subcid|List[Number]|[86369,90723]|商品在大淘客的二级分类id，该分类为前端分类，一个商品可能有多个二级分类id|
|tbcid|Number|50012772|商品在淘宝的分类id|
|mainPic|String|img.alicdn.com/imgextra/i2/4014489195/O1CN01kYlVPs2HnMKYwLLRm\_!!4014489195.jpg|商品主图链接|
|marketingMainPic|String|https://sr.ffquan.com/super_pic/o_1d6fpckjs1ii3h9dkibk9b7h38.jpg|营销主图链接|
|originalPrice|Number|38.5|商品原价|
|actualPrice|Number|28.5|券后价|
|discounts|Number|0.74|折扣力度|
|commissionType|Number|3|佣金类型，0-通用，1-定向，2-高佣，3-营销计划|
|commissionRate|Number|20|佣金比例|
|couponLink|String|https://uland.taobao.com/quan/detail?sellerId=4014489195&activityId=df6c5ba6aa6d4f21a303b50cca2f4a45|优惠券链接|
|couponTotalNum|Number|7000|券总量|
|couponReceiveNum|Number|1000|领券量|
|couponEndTime|String|2019-04-08 23:59:59|优惠券结束时间|
|couponStartTime|String|2019-04-01 00:00:00|优惠券开始时间|
|couponPrice|Number|10|优惠券金额|
|couponConditions|String|38|优惠券使用条件|
|monthSales|Number|1030|30天销量|
|twoHoursSales|Number|30|2小时销量|
|dailySales|Number|20|当日销量|
|brand|Number|4|是否是品牌商品|
|brandId|Number|2301323020|品牌id|
|brandName|String|西维里|品牌名称|
|createTime|String|2019-03-29 10:00:06|商品上架时间|
|shopType|Number|1|店铺类型，1-天猫，0-淘宝|
|shopName|String|西维里旗舰店|店铺名称|
|quanMLink|Number|10|定金，若无定金，则显示0|
|hzQuanOver|Number|100|立减，若无立减金额，则显示0|
|estimateAmount|Number|25.2|预估淘礼金|
|circleText|String|%E7%A5%9E%E4%BB%99%E8%B4%B5%E5%A6%87%E8%86%8F%EF%BC%8C%E4%BD%A0%E9%80%89%E5%AF%B9%E4%BA%86%E5%90%97%E2%9C%94%0A%E7%83%9F%E9%85%B0%E8%83%BA%F0%9F%92%AB%E7%84%95%E9%A2%9C%E5%AE%AB%E5%BB%B7%E8%B4%B5%E5%A6%87%E8%86%8F%0A%F0%9F%94%B9%E6%B7%A1%E5%8C%96%E7%BB%86%E7%BA%B9%EF%BC%8C%E8%A1%A5%E6%B0%B4%E4%BF%9D%E6%B9%BF%EF%BC%8C%E6%8F%90%E6%8B%89%E7%B4%A7%E8%87%B4%0A%E4%B8%80%E6%8A%B9%E9%80%8F%E4%BA%AE%EF%BC%8C%E5%94%A4%E9%86%92%E5%AB%A9%E7%99%BD%E7%BE%8E%E8%82%8C%F0%9F%98%8E%0A2%E4%BB%B6%EF%BF%A538%E5%85%83%F0%9F%92%B0%E5%81%9A%E5%86%BB%E9%BE%84%E5%A5%B3%E7%A5%9E%F0%9F%99%8B%0A'|朋友圈文案，需要url解码后使用|
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
                "quanMLink":0,
                "hzQuanOver":0,
                "estimateAmount":-1,
                "circleText":"%E7%A5%9E%E4%BB%99%E8%B4%B5%E5%A6%87%E8%86%8F%EF%BC%8C%E4%BD%A0%E9%80%89%E5%AF%B9%E4%BA%86%E5%90%97%E2%9C%94%0A%E7%83%9F%E9%85%B0%E8%83%BA%F0%9F%92%AB%E7%84%95%E9%A2%9C%E5%AE%AB%E5%BB%B7%E8%B4%B5%E5%A6%87%E8%86%8F%0A%F0%9F%94%B9%E6%B7%A1%E5%8C%96%E7%BB%86%E7%BA%B9%EF%BC%8C%E8%A1%A5%E6%B0%B4%E4%BF%9D%E6%B9%BF%EF%BC%8C%E6%8F%90%E6%8B%89%E7%B4%A7%E8%87%B4%0A%E4%B8%80%E6%8A%B9%E9%80%8F%E4%BA%AE%EF%BC%8C%E5%94%A4%E9%86%92%E5%AB%A9%E7%99%BD%E7%BE%8E%E8%82%8C%F0%9F%98%8E%0A2%E4%BB%B6%EF%BF%A538%E5%85%83%F0%9F%92%B0%E5%81%9A%E5%86%BB%E9%BE%84%E5%A5%B3%E7%A5%9E%F0%9F%99%8B%0A",
                "freeshipRemoteDistrict":0,
                "id":26389326,
                "goodsId":"598089055725",
                "title":"贵妇膏旗舰店正品遮瑕面霜补水保湿懒人素颜霜女男士化妆品护肤品",
                "dtitle":"【拍2件】烟酰胺焕颜宫廷贵妇膏",
                "originalPrice":108,
                "actualPrice":38,
                "monthSales":215967,
                "twoHoursSales":66,
                "dailySales":10000,
                "commissionType":3,
                "desc":"现货【拍2件哦！第二件0元！】镇店爆款，薇雅强烈推荐，一抹即白！富含烟酰胺和多种维生素精华，上妆清爽不油腻，有效滋润保湿~提亮肤色！改善细纹，滋养修补，女神冻龄的秘密【过敏包退】",
                "couponReceiveNum":0,
                "couponLink":"https://uland.taobao.com/quan/detail?sellerId=2659739949&activityId=30a0c3ed23de42fe87893065a972abf9",
                "couponEndTime":"2020-05-23 23:59:59",
                "couponStartTime":"2020-05-17 00:00:00",
                "couponPrice":70,
                "couponConditions":"108",
                "createTime":"2020-05-16 23:34:24",
                "mainPic":"https://img.alicdn.com/imgextra/i3/2794538083/O1CN01zsUX7U29a3whvdszb_!!2794538083.jpg",
                "marketingMainPic":"https://sr.ffquan.cn/dtk_user_fd/20200510/bqrdpfiulrgasv1earcg0.jpg",
                "shipaiPic":"[https://sr.ffquan.cn/dtk_user_fd/20200705/bs0pe92ulrgd6j7tn4hg0.jpg, https://sr.ffquan.cn/dtk_user_fd/20200705/bs0pekqulrgd6j7tn4lg0.jpg, https://sr.ffquan.cn/dtk_user_fd/20200705/bs0pelqulrgd6j7tn4m00.jpg, https://sr.ffquan.cn/dtk_user_fd/20200705/bs0pemqulrgd6j7tn4n00.jpg, https://sr.ffquan.cn/dtk_user_fd/20200705/bs0penqulrgd6j7tn4ng0.jpg]",
                "shangchaoPic":"[https://sr.ffquan.cn/dtk_user_fd/20200705/bs0pe92ulrgd6j7tn4hg0.jpg, https://sr.ffquan.cn/dtk_user_fd/20200705/bs0pekqulrgd6j7tn4lg0.jpg, https://sr.ffquan.cn/dtk_user_fd/20200705/bs0pelqulrgd6j7tn4m00.jpg, https://sr.ffquan.cn/dtk_user_fd/20200705/bs0pemqulrgd6j7tn4n00.jpg, https://sr.ffquan.cn/dtk_user_fd/20200705/bs0penqulrgd6j7tn4ng0.jpg]",
                "cid":3,
                "discounts":0.35,
                "commissionRate":60,
                "couponTotalNum":100000,
                "shopName":"蓝尼芳可旗舰店",
                "brand":0,
                "brandId":1121198678,
                "brandName":"",
                "itemLink":"https://detail.tmall.com/item.htm?id=598089055725",
                "detailPics":"",
                "shopType":1,
                "subcid":[
                    111746
                ],
                "tbcid":50011980
            }
        ],
        "totalNum":16499,
        "pageId":"76679471048598b0"
    }
}
RESULTINFO;

}