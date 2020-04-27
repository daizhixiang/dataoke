<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 联想词
 */
class SearchSuggestion extends DtkRequest
{
    public $version = 'v1.0.2';
    public $api = '/goods/search-suggestion';
    public $extraParasField = [
        "关键词" => "keyWords",//		是	String
        "当前搜索API类型" => "type",//	：1.大淘客搜索 2.联盟搜索 3.超级搜索	是	Number
    ];
}