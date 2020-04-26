<?php

require 'autoload.php';
$client = new \Dtk\Client\DtkClient(
    '5ea15338e40cf',
    "59a50e9eda3e12213fec64abf6785379"
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

