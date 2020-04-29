<?php
include '../../../autoload.php';

$obj = new \DaTaoKe\Client\DtkClient(
    "XXXXXXXXXX",
    "XXXXXXXXXXXXXXXXXXXX",
    'array'
);
$params = array_merge((array)$_GET,(array)$_POST);
$obj->setSteategyObj("GetGoodsList",$params);
print_r($obj->performRequests());

