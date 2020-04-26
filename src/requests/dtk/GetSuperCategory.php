<?php

namespace Dtk\Requests\Dtk;

use Dtk\Requests\DtkRequest;

/**
 * 超级分类
 */
class GetSuperCategory extends DtkRequest
{
    public $version = 'v1.1.0';
    public $apiLink = 'https://openapi.dataoke.com/api/category/get-super-category';
    public $extraParasField = [];
}