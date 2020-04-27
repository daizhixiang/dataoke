<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 单品详情
 */
class GetPrivilegeLink extends DtkRequest
{
    public $version = 'v1.1.1';
    public $api = '/tb-service/get-privilege-link';
    public $extraParasField = [
        "淘宝商品id" => "goodsId",//		是	String
        "优惠券ID" => "couponId",//		否	String	商品的优惠券ID，一个商品在联盟可能有多个优惠券，可通过填写该参数的方式选择使用的优惠券，请确认优惠券ID正确，否则无法正常跳转
        "推广位ID" => "pid",//		否	string	用户可自由填写当前大淘客账号下已授权淘宝账号的任一pid，若未填写，则默认使用创建应用时绑定的pid
        "渠道id" => "channelId",//		否	string	用于代理体系，渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认从私域管理系统中提取的渠道id是否正确
    ];
}