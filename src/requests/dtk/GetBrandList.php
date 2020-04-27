<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 品牌库
 */
class GetBrandList extends DtkRequest
{
    public $version = 'v1.1.1';
    public $api = '/tb-service/get-brand-list';
    public $extraParasField = [
        "页码" => "pageId",//		是	String
        "每页条数" => "pageSize",//		否	Number	默认为20，最大值100
    ];
}