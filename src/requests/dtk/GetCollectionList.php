<?php


namespace Requests\Dtk;

use Requests\DtkRequest;

/**
 * 我的收藏
 */
class GetCollectionList extends DtkRequest
{
    public $version = 'v1.0.1';
    public $apiLink = 'https://openapi.dataoke.com/api/goods/get-collection-list';
    public $extraParasField = [
        "pageSize",//	每页条数	否	Number	默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200
        "pageId",//	分页id	是	String	默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
        "cid",//	商品在大淘客的分类id	是	String	大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id，1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺
        "trailerType",//	是否返回预告商品	否	Number	（如果为是1，则返回全部商品（包含在线商品），为0只返回在线商品）默认返回全部商品
        "sort",//	排序字段	否	String	默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
        "collectionTimeOrder",//	加入收藏时间	否	Number
    ];
}