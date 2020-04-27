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
    public $extraParasField = [
        "每页条数" => "pageSize",//	是	Number	默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200
        "分页id"=>"pageId",//	是	String	默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
        "关键词搜索" => "keyWords",//	是	String
        "一级类目Id" => "cids",//	否	String	大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id，一级分类id请求详情：1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺
        "二级类目Id" => "subcid",//	否	Number	大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
        "是否聚划算" => "juHuaSuan",//	否	Number	1-聚划算商品，0-非聚划算商品，不填默认为所有商品
        "是否淘抢购" => "taoQiangGou",//	否	Number	1-淘抢购商品，0-非淘抢购商品，不填默认为所有商品
        "是否天猫商品" => "tmall",//	否	Number	1-天猫商品，0-非天猫商品，不填默认为所有商品
        "是否天猫超市商品" => "tchaoshi",//	否	Number	1-天猫超市商品，0-非天猫超市商品，不填默认为所有商品
        "是否金牌卖家" => "goldSeller",//	否	Number	1-金牌卖家，0-非金牌卖家，不填默认为所有店铺
        "是否海淘商品" => "haitao",//	否	Number	1-海淘商品，0-非海淘商品，不填默认为所有商品
        "是否品牌商品" => "brand",//	否	Number	1-品牌商品，0-非品牌商品，不填默认为所有商品
        "品牌id" => "brandIds",//	否	String	当brand传入0时，再传入brandIds将获取不到结果。品牌id可以传多个，以英文逗号隔开，如：”345,321,323”
        "价格（券后价）下限" => "priceLowerLimit",//	否	Number
        "价格（券后价）上限" => "priceUpperLimit",//	否	Number
        "最低优惠券面额" => "couponPriceLowerLimit",//	否	Number
        "最低佣金比率" => "commissionRateLowerLimit",//	否	Number
        "最低月销量" => "monthSalesLowerLimit",//	否	Number
        "排序字段" => "sort",//	否	String	默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
        "偏远地区包邮" => "freeshipRemoteDistrict",//	否	Number	1.是，0.否
    ];
}