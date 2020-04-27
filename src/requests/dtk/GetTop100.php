<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 热搜记录
 */
class GetTop100 extends DtkRequest
{
    public $version = 'v1.0.1';
    public $api = '/category/get-top100';
    public $extraParasField = [];
}