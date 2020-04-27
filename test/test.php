<?php
include '../../../autoload.php';
use \DaTaoKe\Requests\BindSteategyClass;

/**
 * 获取接口信息（终端输出）
 */
function getApiInfo(){
    //获取所有接口完整信息
//    BindSteategyClass::GetAllSteategy(null,true);
    //获取所有接口信息
//    BindSteategyClass::GetAllSteategy();
    //获取指定接口完整信息
    BindSteategyClass::GetAllSteategy("活动商品",true);
    //获取指定接口信息
//    BindSteategyClass::GetAllSteategy("活动商品");
}
getApiInfo();

/**
 * 根据上面查到的信息可以直接拿数据
 */
$obj = new \DaTaoKe\Client\DtkClient(
    "XXXXXXXXXX",
    "XXXXXXXXXXXXXXXXXXXX",
    'array'
);
$params = array_merge((array)$_GET,(array)$_POST);
$obj->setSteategyObj("GetGoodsList",$params);
print_r($obj->performRequests());

