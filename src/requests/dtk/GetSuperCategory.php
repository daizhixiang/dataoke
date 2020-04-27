<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 超级分类
 */
class GetSuperCategory extends DtkRequest
{
    public $version = 'v1.1.0';
    public $api = '/category/get-super-category';
    public $extraParasField = [];
}