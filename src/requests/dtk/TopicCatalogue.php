<?php

namespace Requests\Dtk;

use Requests\DtkRequest;

/**
 * 精选专辑
 */
class TopicCatalogue extends DtkRequest
{
    public $version = 'v1.1.0';
    public $apiLink = 'https://openapi.dataoke.com/api/goods/topic/catalogue';
    public $extraParasField = [];
}