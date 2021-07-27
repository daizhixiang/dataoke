<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 各大榜单
 */
class GetRankingList extends DtkRequest
{
    public $version = 'v1.3.0';
    public $api = '/goods/get-ranking-list';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|rankType|Number|是|榜单类型，1.实时榜 2.全天榜 3.热推榜 4.复购榜 5.热词飙升榜 6.热词排行榜 7.综合热搜榜|
|cid|Number|否|大淘客一级类目id，仅对实时榜单、全天榜单有效|
|pageSize|Number|否|每页条数返回条数（支持10,20.50，默认返回20条）|
|pageId|String|否|分页id：常规分页方式，请直接传入对应页码（比如：1,2,3……）。超过200条，分页返回为空|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|id|Number|19259135|商品id，在大淘客的商品id|
|goodsId|Number|590858626868|淘宝商品id|
|ranking|Number|1|榜单名次|
|newRankingGoods|Number|1|是否新上榜商品（12小时内入榜的商品） 0.否1.是|
|dtitle|String|【李佳琦推荐】奢华芯肌素颜爆水霜|短标题|
|actualPrice|Number|39.9|券后价|
|commissionRate|Number|30|佣金比例|
|couponPrice|Number|300|优惠券金额|
|couponReceiveNum|Number|4000|领券量|
|couponTotalNum|Number|10000|券总量|
|monthSales|Number|8824|月销量||
|twoHoursSales|Number|1542|2小时销量||
|dailySales|Number|4545|当天销量|
|hotPush|Number|42|热推值|
|mainPic|String|“https://img.alicdn.com/i4/1687451966/O1CN01rTeKnv1QOTBnyOXDe\_!!1687451966.jpg“|商品图|
|title|String|“2019新款运动短裤女宽松防走光韩版外穿ins潮休闲学生bf夏季阔腿”|商品长标题|
|desc|String|“多款可选！显瘦高腰韩版阔腿裤五分裤，不起球，不掉色。舒适面料，不挑身材，高腰设计”|商品描述|
|originalPrice|Number|29.9|商品原价|
|couponLink|String|“https://uland.taobao.com/quan/detail?sellerId=1687451966&activityId=ffef827d9a5747efbbe02a93c6d7ec13“|优惠券链接|
|couponStartTime|String|“2019-06-04 00:00:00”|优惠券开始时间|
|couponEndTime|String|“2019-06-06 23:59:59”|优惠券结束时间|
|commissionType|Number|3|佣金类型|
|createTime|String|“2019-06-03 17:55:18”|创建时间|
|activityType|Number|1|活动类型，1-无活动，2-淘抢购，3-聚划算|
|picList|Array|“https://img.alicdn.com/imgextra/i2/1687451966/O1CN01WNuZcl1QOTCM9NsrO_!!1687451966.jpg,https://img.alicdn.com/imgextra/i4/1687451966/O1CN01h2ih4v1QOTCOxlZDj_!!1687451966.jpg“|营销图|
|guideName|String|易折网|放单人名称|
|shopType|Number|1|店铺类型，1-天猫，0-淘宝|
|couponConditions|Number|29|优惠券使用条件|
|avgSales|Number|586|日均销量（仅复购榜返回该字段）|
|entryTime|String|“2019-06-06 10:59:59”|入榜时间（仅复购榜返回该字段）|
|sellerId|String|4014489195|淘宝卖家id|
|quanMLink|Number|10|定金，若无定金，则显示0|
|hzQuanOver|Number|100|立减，若无立减金额，则显示0|
|yunfeixian|Number|1|0.不包运费险 1.包运费险|
|estimateAmount|Number|25.2|预估淘礼金|
|freeshipRemoteDistrict|Number|1|偏远地区包邮，0.不包邮，1.包邮|
|top|Number|1|热词榜排名（适用于5.热词飙升榜6.热词排行榜）|
|keyWord|String|螺蛳粉|热搜词（适用于5.热词飙升榜6.热词排行榜）|
|upVal|Number|1|排名提升值（适用于5.热词飙升榜）|
|hotVal|Number|123454|排名热度值|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "status":200,
    "data":{
        "time":1599814496244,
        "code":0,
        "msg":"成功",
        "data":[
            {
                "id":28998308,
                "goodsId":"576874945203",
                "ranking":1,
                "dtitle":"【王锦记】400g南京同仁堂老红糖块",
                "actualPrice":9,
                "commissionRate":40,
                "couponPrice":20,
                "couponReceiveNum":22000,
                "couponTotalNum":100000,
                "monthSales":25851,
                "twoHoursSales":9201,
                "dailySales":21349,
                "hotPush":18606,
                "mainPic":"https://img.alicdn.com/imgextra/i3/2989265740/O1CN01UL7nya1sGy0dbHFf1_!!2989265740.jpg",
                "title":"南京同仁堂正品纯手工古法土老红糖姜茶气血月经黑糖块单独小包装",
                "desc":"只要9元----【同仁堂】一袋足足400克！15：1黄金浓缩！精选甘愿蔗糖，化水无渣，真正的甜而不齁，温补调和，暖宫驱寒、益气补血、美容养颜，四季必备哦！",
                "originalPrice":29,
                "couponLink":"https://uland.taobao.com/quan/detail?sellerId=3076820571&activityId=9a4b6d6f28954fa182a640e514014916",
                "couponStartTime":"2020-09-11 00:00:00",
                "couponEndTime":"2020-09-13 23:59:59",
                "commissionType":3,
                "createTime":"2020-09-10 14:50:35",
                "activityType":1,
                "imgs":"https://img.alicdn.com/imgextra/i4/3076820571/O1CN01mIJvxQ1G5Yld1rCgR_!!3076820571.jpg,https://img.alicdn.com/imgextra/i3/3076820571/O1CN01NQhlX91G5Yl2VKk7z_!!3076820571.jpg,https://img.alicdn.com/imgextra/i2/3076820571/O1CN01zIfvyl1G5Yiipe0nn_!!3076820571.jpg,https://img.alicdn.com/imgextra/i1/3076820571/O1CN012IG5W41G5Ycw6Mjpx_!!3076820571.jpg,https://img.alicdn.com/imgextra/i1/3076820571/O1CN01MMPMtD1G5YkDfIOC7_!!3076820571.jpg",
                "guideName":"券魔方社群直播",
                "shopType":1,
                "couponConditions":"29",
                "newRankingGoods":0,
                "sellerId":"3076820571",
                "quanMLink":0,
                "hzQuanOver":0,
                "yunfeixian":1,
                "estimateAmount":0,
                "freeshipRemoteDistrict":0
            }
        ]
    },
    "msg":"请求成功"
}
RESULTINFO;

}