<?php

require 'autoload.php';
$client = new \Client\DtkClient(
    'xxxxxxxxxxxx',
    'xxxxxxxxxxxxxxxxxxxxxxxxxx'
);

$param = array_merge((array)$_GET,(array)$_POST);
function test($SteategyObj = "GetGoodsList"){
    global $client;
    global $param;
    return $client
        ->setSteategyObj($SteategyObj,$param)
        ->performRequests();
}
echo json_encode(test("CategoryDdqGoodsList"));

