<?php

namespace Dtk\Requests\Dtk;

use Dtk\Requests\DtkRequest;

/**
 * 热搜记录
 */
class GetTop100 extends DtkRequest
{
    public $version = 'v1.0.1';
    public $apiLink = 'https://openapi.dataoke.com/api/category/get-top100';
    public $extraParasField = [];
}