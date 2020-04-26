<?php


namespace Requests\Dtk;


use Requests\DtkRequest;

/**
 * 品牌库
 */
class GetBrandList extends DtkRequest
{
    public $version = 'v1.1.1';
    public $apiLink = 'https://openapi.dataoke.com/api/tb-service/get-brand-list';
    public $extraParasField = [
        "pageId",//	页码	是	String
        "pageSize",//	每页条数	否	Number	默认为20，最大值100
    ];
}