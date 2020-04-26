<?php


namespace Requests\Dtk;


use Requests\DtkRequest;

/**
 * 联想词
 */
class SearchSuggestion extends DtkRequest
{
    public $version = 'v1.0.2';
    public $apiLink = 'https://openapi.dataoke.com/api/goods/search-suggestion';
    public $extraParasField = [
        "keyWords",//	关键词	是	String
        "type",//	当前搜索API类型：1.大淘客搜索 2.联盟搜索 3.超级搜索	是	Number
    ];
}