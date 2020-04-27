<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 商品列表
 */
class GetGoodsList extends DtkRequest
{
    public $version = 'v1.2.2';
    public $api = '/goods/get-goods-list';
    public $extraParasField = [
        "每页条数" => "pageSize",//		否	Number	默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200
        "分页id" => "pageId",//		是	String	默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
        "排序方式" => "sort",//		否	String	默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
        "一级类目id" => "cids",//		否	String	大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
        "二级类目id" => "subcid",//		否	Number	大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
        "商品卖点" => "specialId",//		否	Number	1.拍多件活动；2.多买多送；3.限量抢购；4.额外满减；6.买商品礼赠
        "是否聚划算" => "juHuaSuan",//		否	Number	1-聚划算商品，0-所有商品，不填默认为0
        "是否淘抢购" => "taoQiangGou",//		否	Number	1-淘抢购商品，0-所有商品，不填默认为0
        "是否天猫商品" => "tmall",//		否	Number	1-天猫商品，0-所有商品，不填默认为0
        "是否天猫超市商品" => "tchaoshi",//		否	Number	1-天猫超市商品，0-所有商品，不填默认为0
        "是否金牌卖家" => "goldSeller",//		否	Number	1-金牌卖家，0-所有商品，不填默认为0
        "是否海淘商品" => "haitao",//		否	Number	1-海淘商品，0-所有商品，不填默认为0
        "是否预告商品" => "pre",//		否	Number	1-预告商品，0-非预告商品
        "是否品牌商品" => "brand",//		否	Number	1-品牌商品，0-所有商品，不填默认为0
        "品牌id" => "brandIds",//		否	String	当brand传入0时，再传入brandIds将获取不到结果。品牌id可以传多个，以英文逗号隔开，如：”345,321,323”
        "价格（券后价）下限" => "priceLowerLimit",//		否	Number
        "价格（券后价）上限" => "priceUpperLimit",//		否	Number
        "最低优惠券面额" => "couponPriceLowerLimit",//		否	Number
        "最低佣金比率" => "commissionRateLowerLimit",//		否	Number
        "最低月销量" => "monthSalesLowerLimit",//		否	Number
        "偏远地区包邮" => "freeshipRemoteDistrict",//		否	Number	1.是，0.否
    ];
}