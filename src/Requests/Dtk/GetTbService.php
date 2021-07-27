<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 联盟搜索
 */
class GetTbService extends DtkRequest
{
    public $version = 'v2.1.0';
    public $api = '/tb-service/get-tb-service';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|pageNo|Number|是|第几页，默认1|
|pageSize|Number|是|每页条数， 默认20，范围值1~100|
|keyWords|String|是|查询词|
|sort|String|否|排序指标：销量（total_sales），淘客佣金比率（tk_rate）， 累计推广量（tk_total_sales），总支出佣金（tk_total_commi），价格（price）,排序方式：排序_des（降序），排序_asc（升序）,示例：升序查询销量：total_sales_asc|
|source|Number|否|是否商城商品，设置为1表示该商品是属于淘宝商城商品，设置为非1或不设置表示不判断这个属性（和overseas字段冲突，若已请求source，请勿再请求overseas）|
|overseas|Number|否|是否海外商品，设置为1表示该商品是属于海外商品，设置为非1或不设置表示不判断这个属性（和source字段冲突，若已请求overseas，请勿再请求source）|
|endPrice|Number|否|折扣价范围上限，单位：元|
|startPrice|Number|否|折扣价范围下限，单位：元|
|startTkRate|Number|否|媒体淘客佣金比率下限，如：1234表示12.34%|
|endTkRate|Number|否|商品筛选-淘客佣金比率上限，如：1234表示12.34%|
|hasCoupon|Boolean|否|是否有优惠券，设置为true表示该商品有优惠券，设置为false或不设置表示不判断这个属性|
|specialId|string|否|会员运营id|
|channelId|string|否|渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认填入的渠道id是正确的channelId对应联盟的relationId|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|title|String|毛呢阔腿裤港味复古女裤子秋冬九分裤萝卜裤显瘦高腰韩版2017新款|商品信息-商品标题|
|volume|Number|123|商品信息-30天销量|
|nick|String|旗舰店|店铺信息-卖家昵称|
|coupon_start_time|String|2017-10-29|优惠券信息-优惠券开始时间|
|coupon_end_time|String|2017-10-29|优惠券信息-优惠券结束时间|
|tk_total_sales|String|11|商品信息-淘客30天推广量|
|coupon_id|String|d62db1ab8d9546b1bf0ff49bda5fc33b|优惠券信息-优惠券id|
|pict_url|String|https://img.alicdn.com/bao/uploaded/i4/745957850/TB1WzSRmV9gSKJjSspbXXbeNXXa_!!0-item_pic.jpg|商品信息-商品主图|
|small_images|String|https://img.alicdn.com/i4/3077291146/TB2NA3poDnI8KJjSszgXXc8ApXa_!!3077291146.jpg|商品信息-商品小图列表|
|reserve_price|String|102.00|商品信息-商品一口价格|
|zk_final_price|String|88.00|商品信息-商品折扣价格|
|user_type|Number|1|店铺信息-卖家类型，0-表示集市，1-表示天猫|
|seller_id|Number|232332|店铺信息-卖家id|
|coupon_total_count|Number|23232|优惠券信息-优惠券总量|
|coupon_remain_count|Number|111|优惠券信息-优惠券剩余量|
|coupon_info|String|满299元减20元|优惠券信息-优惠券满减信息|
|shop_title|String|xx旗舰店|店铺信息-店铺名称|
|shop_dsr|Number|13|店铺信息-店铺dsr评分|
|level_one_category_name|Number|女装|商品信息-一级类目名称|
|level_one_category_id|Number|20|商品信息-一级类目ID|
|category_name|String|连衣裙|商品信息-叶子类目名称|
|category_id|Number|162201|商品信息-叶子类目id|
|short_title|String|xxsd|商品信息-商品短标题|
|white_image|String|https://img.alicdn.com/bao/uploaded/i4/745957850/TB1WzSRmV9gSKJjSspbXXbeNXXa\_!!0-item_pic.jpg|商品信息-商品白底图|
|coupon_start_fee|String|满X元可用。如：满299元减20元|优惠券信息-优惠券起用门槛|
|coupon_amount|String|如：满299元减20元|优惠券信息-优惠券面额|
|item_description|String|季凉被 全棉亲肤|商品信息-宝贝描述(推荐理由)|
|item_id|Number|5678899993|商品信息-宝贝id|
|commission_rate|Number|5|佣金比例|
|ysyl_tlj_face|Number|5|预估淘礼金|
|presale_deposit|Number|5|预售定金|
|presale_discount_fee_text|String|预售立减30|定金立减|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time":1555725595933,
    "code":0,
    "msg":"成功",
    "data":[
        {
            "title":"亮片刺绣T恤 夏装韩版宽松大码女装中长款下衣失踪休闲上衣服潮",
            "volume":12419,
            "nick":"云美莎服饰旗舰店",
            "coupon_start_time":"2019-04-21",
            "coupon_end_time":"2019-04-23",
            "tk_total_sales":"14459",
            "coupon_id":"766283803ca64bea8074fa1b574635a4",
            "pict_url":"https://img.alicdn.com/bao/uploaded/i3/3012579599/O1CN01JLYm4p2KmOKrJMlQm_!!0-item_pic.jpg",
            "small_images":{
                "string":[
                    "https://img.alicdn.com/i4/3012579599/O1CN01zhLM4k2KmOKtD6NRD_!!3012579599.jpg",
                    "https://img.alicdn.com/i2/3012579599/O1CN012U0wuV2KmOKshy7qz_!!3012579599.jpg",
                    "https://img.alicdn.com/i2/3012579599/O1CN01NnJqKR2KmOKrJ9XUx_!!3012579599.jpg",
                    "https://img.alicdn.com/i1/3012579599/O1CN01Kdt9tE2KmOKs8PDb1_!!3012579599.jpg"
                ]
            },
            "reserve_price":"168",
            "zk_final_price":"59.99",
            "user_type":1,
            "seller_id":3012579599,
            "coupon_total_count":100000,
            "coupon_remain_count":94000,
            "coupon_info":"满40.00元减20元",
            "shop_title":"云美莎服饰旗舰店",
            "shop_dsr":48263,
            "level_one_category_name":"女装/女士精品",
            "level_one_category_id":16,
            "category_name":"T恤",
            "category_id":50000671,
            "short_title":"亮片刺绣夏装韩版宽松大码女装t恤",
            "white_image":"https://img.alicdn.com/bao/uploaded/O1CN01POpVQx2KmOKpeAMrB_!!2-item_pic.png",
            "coupon_start_fee":"40.00",
            "coupon_amount":"20",
            "item_description":"",
            "item_id":588009231660,
            "commission_rate":5,
            "ysyl_tlj_face":5,
            "presale_deposit":5,
            "presale_discount_fee_text":"预售立减30"
        }
    ]
}
RESULTINFO;

}