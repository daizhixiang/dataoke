<?php

namespace Dtk\Requests\Dtk;

use Dtk\Requests\DtkRequest;
/**
 * 官方活动推广
 */
class GetTbTopicList extends DtkRequest
{
    public $version = 'v1.2.0';
    public $apiLink = 'https://openapi.dataoke.com/api/category/get-tb-topic-list';
    public $extraParasField = [
        "pageId",//	分页id	是	String	支持传统的页码分页方式
        "pageSize",//	每页条数	否	Number	默认为20
        "type",//	端口类型	否	Number	输出的端口类型：0.全部（默认），1.PC，2.无线
        "channelID",//	渠道ID	否	Number	阿里妈妈上申请的渠道id
    ];
}