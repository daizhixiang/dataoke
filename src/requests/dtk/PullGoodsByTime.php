<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 定时拉取
 */
class PullGoodsByTime extends DtkRequest
{
    public $version = 'v1.2.2';
    public $api = '/goods/pull-goods-by-time';
    public $extraParasField = [
        "每页条数" => "pageSize",//	否	Number	默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200
        "分页id" => "pageId",//	是	String	默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
        "一级类目id" => "cid",//	否	String	大淘客的一级分类id。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
        "二级类目id" => "subcid",//	否	Number	大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
        "是否预告商品" => "pre",//	否	Number	1-预告商品，0-非预告商品
        "排序方式" => "sort",//	否	String	默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
        "开始时间" => "startTime",//	否	String	格式为yy-mm-dd hh:mm:ss，商品下架的时间大于等于开始时间
        "结束时间" => "endTime",//	否	String	默认为请求的时间，商品下架的时间小于等于结束时间
        "偏远地区包邮" => "freeshipRemoteDistrict",//	否	Number	1.是，0.否
    ];
}