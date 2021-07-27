<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 高佣转链
 */
class GetPrivilegeLink extends DtkRequest
{
    public $version = 'v1.3.0';
    public $api = '/tb-service/get-privilege-link';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|goodsId|String|是|淘宝商品id|
|couponId|String|否|商品的优惠券ID，一个商品在联盟可能有多个优惠券，可通过填写该参数的方式选择使用的优惠券，请确认优惠券ID正确，否则无法正常跳转|
|pid|string|否|推广位ID，用户可自由填写当前大淘客账号下已授权淘宝账号的任一pid，若未填写，则默认使用创建应用时绑定的pid|
|channelId|string|否|渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认填入的渠道id是正确的 channelId对应联盟的relationId|
|rebateType|Number|否|付定返红包，0.不使用付定返红包，1.参与付定返红包|
|specialId|string|否|会员运营id|
|externalId|string|否|淘宝客外部用户标记，如自身系统账户ID；微信ID等|
|xid|string|否|团长与下游渠道合作的特殊标识，用于统计渠道推广效果 （新增入参）|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|couponClickUrl|String|https://uland.taobao.com/coupon/edetail?e=nqUNB1NOF3Bt3vqbdXnGloankzPYmeEFkgNrw6YHQf9pZTj41Orn8MwBAs06HAOzqQomYNedOiHDYPmqkFXqLR0HgBdG%2FDDL%2F1M%2FBw7Sf%2FesGXLf%2BqX4cbeC%2F2cR0p0NlWH0%2BknxpnCJJP%2FQkZSsyo1HvKjXo4uz&pid=mm_26381042_12970066_52864659&af=1|商品优惠券推广链接|
|couponEndTime|String|2016-09-26|优惠券结束时间|
|couponInfo|String|满16元减10元|优惠券面额|
|couponStartTime|String|2016-09-25|优惠券开始时间|
|itemId|Number|524136796550|商品id|
|couponTotalCount|Number|8000|优惠券总量|
|couponRemainCount|Number|6859|优惠券剩余量|
|itemUrl|String|https://s.click.taobao.com/t?spm=a2e2e.10720394/c.90202110.1.4399704cUUhhH0&e=m%3D2%26s%3D0NJS731SUEdw4vFB6t2Z2ueEDrYVVa64LKpWJ%2Bin0XLjf2vlNIV67uIA4kDYDopEpOjgxi0uT208hw4H8GMUew7uoRPWrIBwR7CIpaNCoiKr9WTFywb%2BCtGNFs53xi4QGSKqJrqeJvt5ArodCWjzv9fsai3uVirbXH%2BQH9e66Y4%3D|商品淘客链接|
|tpwd|String|￥vpZTYeQ3RtO￥|淘口令|
|maxCommissionRate|String|20|佣金比例|
|shortUrl|String|https://s.click.taobao.com/xaulr5w|短链接|
|minCommissionRate|String|20|当传入请求参数channelId、specialId、externalId时，该字段展示预估最低佣金率(%)(接联盟通知，官方比价订单佣金调整正式生效时间推迟至7月22日)|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "status":200,
    "data":{
        "time":1598946537777,
        "code":0,
        "msg":"成功",
        "data":{
            "couponClickUrl":"https://uland.taobao.com/coupon/edetail?e=LCnJWzIy8tUGQASttHIRqTYYcS2Iro4jK2%2BJI7%2F4RPB%2F6pl3MjcEubH2A8%2BEQTrjtawzeKC18AXUj7rKYxTRVth9MuaGC%2B1pWv9OAj9evKDahba4h8MrZ%2Bdth9k8bqqSHKTgBzHkoM7XTQC0vfau6E%2F9Zk7cDx8UPrKiYwdarE%2FmZlrHb6YhPHui%2Fn%2FQ7Z5VJn9Mr14cp%2FDbTe5vXEuE1A%3D%3D&traceId=0bb61b0b15989465375564715eeceb&union_lens=lensId:TAPI@1598946537@0b1545dd_0d69_17448a3f070_c015@01&activityId=08c9cbadce574e13ae6d015ec7a4dc17",
            "couponEndTime":"2020-09-02",
            "couponInfo":"满40元减5元",
            "couponStartTime":"2020-09-01",
            "itemId":"535615570326",
            "couponTotalCount":"100000",
            "couponRemainCount":"100000",
            "itemUrl":"https://s.click.taobao.com/t?e=m%3D2%26s%3Dj%2F20A0nZ2HNw4vFB6t2Z2ueEDrYVVa64K7Vc7tFgwiHLWlSKdGSYDgBi8qN29g3dlovu%2FCElQOsHfn%2FCbIhLuAxQE6vJOn1L%2BQ8vtIwWbsIspAC80QBskx8X7G7Q37BaSJpaa6H0%2BPDF4qyLP3Oqz%2F1SarTXhIOTrhzfEh3ilxbbJ2%2FqLVUXutkYvQZuIwx3oGeIQL4Fi9Gsb%2FLqJX5TW3YHgeIfcEekAtuQeASk5p8tzYMUmFOYRg%3D%3D&union_lens=lensId:TAPI@1598946537@0b1545dd_0d69_17448a3f070_c015@01",
            "tpwd":"￥dkFqcWgeSEj￥",
            "maxCommissionRate":"15.00",
            "shortUrl":"https://s.click.taobao.com/DILqywu",
            "minCommissionRate":""
        }
    },
    "msg":"请求成功"
}
RESULTINFO;

}