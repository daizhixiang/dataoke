<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 官方活动推广
 */
class GetTbTopicList extends DtkRequest
{
    public $version = 'v1.2.0';
    public $api = '/category/get-tb-topic-list';
    public $extraParasField = [
        "分页id" => "pageId",//		是	String	支持传统的页码分页方式
        "每页条数" => "pageSize",//		否	Number	默认为20
        "端口类型" => "type",//		否	Number	输出的端口类型：0.全部（默认），1.PC，2.无线
        "渠道ID" => "channelID",//		否	Number	阿里妈妈上申请的渠道id
    ];
}