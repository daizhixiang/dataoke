<?php

namespace Dtk\Requests\Dtk;

use Dtk\Requests\DtkRequest;
/**
 * 热门活动
 */
class ActivityCatalogue extends DtkRequest
{
    public $version = 'v1.1.0';
    public $apiLink = 'https://openapi.dataoke.com/api/goods/activity/catalogue';
    public $extraParasField = [];
}