<?php

namespace Requests\Dtk;

use Requests\DtkRequest;

/**
 * 各大榜单
 */
class GetRankingList extends DtkRequest
{
    public $version = 'v1.2.2';
    public $apiLink = 'https://openapi.dataoke.com/api/goods/get-ranking-list';
    public $extraParasField = [
        "rankType",//	榜单类型	是	Number	1.实时榜 2.全天榜 3.热推榜 4.复购榜 5.热词飙升榜 6.热词排行榜 7.综合热搜榜
        "cid",//	大淘客一级类目id	否	Number	仅对实时榜单、全天榜单有效
    ];
}