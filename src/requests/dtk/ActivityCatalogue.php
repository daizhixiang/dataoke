<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 热门活动
 */
class ActivityCatalogue extends DtkRequest
{
    public $version = 'v1.1.0';
    public $api = '/goods/activity/catalogue';
    public $extraParasField = [];
}