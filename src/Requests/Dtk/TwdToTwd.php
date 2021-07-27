<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 淘口令转淘口令
 */
class TwdToTwd extends DtkRequest
{
    public $version = 'v1.0.0';
    public $api = 'tb-service/twd-to-twd';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|content|string|是|支持包含文本的淘口令，但最好是一个单独淘口令|
|pid|string|否|推广位ID，用户可自由填写当前大淘客账号下已授权淘宝账号的任一pid，若未填写，则默认使用创建应用时绑定的pid|
|channelId|string|否|渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认填入的渠道id是正确的|
|special_id|string|否|会员运营ID|
|external_id|string|否|淘宝客外部用户标记，如自身系统账户ID；微信ID等|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|itemId|Number|524136796550|商品id|
|tpwd|String|￥vpZTYeQ3RtO￥|淘口令|
|maxCommissionRate|String|20|佣金比例|
|minCommissionRate|String|20|当传入请求参数channelId、specialId、externalId时，该字段展示预估最低佣金率(%)(接联盟通知，官方比价订单佣金调整正式生效时间推迟至7月22日)|
|originUrl|String|https://s.click.taobao.com/t?spm=a2e2e.10720394/c.90202110.1.4399704cUUhhH0&e=m%3D2%26s%3D0NJS731SUEdw4vFB6t2Z2ueEDrYVVa64LKpWJ%2Bin0XLjf2vlNIV67uIA4kDYDopEpOjgxi0uT208hw4H8GMUew7uoRPWrIBwR7CIpaNCoiKr9WTFywb%2BCtGNFs53xi4QGSKqJrqeJvt5ArodCWjzv9fsai3uVirbXH%2BQH9e66Y4%3D|原始链接|
|title|String|认养一头牛全脂奶粉800g|商品标题|
|couponClickUrl|String|https://uland.taobao.com/coupon/edetail?e=nqUNB1NOF3Bt3vqbdXnGloankzPYmeEFkgNrw6YHQf9pZTj41Orn8MwBAs06HAOzqQomYNedOiHDYPmqkFXqLR0HgBdG%2FDDL%2F1M%2FBw7Sf%2FesGXLf%2BqX4cbeC%2F2cR0p0NlWH0%2BknxpnCJJP%2FQkZSsyo1HvKjXo4uz&pid=mm_26381042_12970066_52864659&af=1|商品优惠券推广链接|
|couponInfo|String|满16元减10元|优惠券面额|
|couponEndTime|String|2016-09-26|优惠券结束时间|
|couponStartTime|String|2016-09-26|优惠券开始时间|
|couponTotalCount|Number|8000|优惠券总量|
|couponRemainCount|Number|6859|优惠券剩余量|
|shortUrl|String|https://s.click.taobao.com/xaulr5w|短链接|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time":1597312154111,
    "code":0,
    "msg":"成功",
    "data":{
        "couponClickUrl":"",
        "couponEndTime":"",
        "couponInfo":"",
        "couponStartTime":"",
        "itemId":"577582267511",
        "couponTotalCount":"",
        "couponRemainCount":"",
        "originUrl":"https://uland.taobao.com/coupon/edetail?e=0XTYaxrV4nQGQASttHIRqYLsyl3baZLsB0Kqi0hLZnZWGKUTWWim8zZAq%2BmR21y8ztC5Ka9Rt%2Fn7hHFiLOQ7kRrn5v%2Bgi70NY1kWovEdEWPKdDtLTN7C7%2FsnwWZGSCD41ug731VBEQm0m3Ckm6GN2CwynAdGnOngMmnVmWO1H8vvI9wRv%2BDqFlLajOROSSHl4ncgeMjsGdDyQVoTTYs3iQ%3D%3D&traceId=0bb6ad0215970492414305883eef88&union_lens=lensId:TAPI@1597049241@0b081808_0d3e_173d78d7f6e_9380@01&xId=53dxYB9Rg8iMfaftInhfw9BfakT1XpOOv6EsblxQs0vmeSK9mxlXkmx0CsDO7M9rYHLkRyeWBfjy32briYLet6QogQPJi8xnYHDgYGXCEpen&activityId=fdf21ddd628b4cce8cdff627df62f5ba&src=qhkj_dtkp&un=29d42553880b264c4b68d5f77a161062&share_crt_v=1&ut_sk=1.utdid_23116944_1597049241516.TaoPassword-Outside.taoketop&spm=a2159r.13376465.0.0&sp_tk=cG1jaWNZVHZ2Vjc=&bxsign=tcd1597312152946fc7f667b068b4c009d08dc8e0b66ad20",
        "tpwd":"￥E08xc1WLlOY￥",
        "maxCommissionRate":"0.97",
        "shortUrl":"https://s.click.taobao.com/66XScxu",
        "minCommissionRate":"",
        "title":"包邮认养一头牛常温法式酸奶200g*12盒早餐风味酸牛奶整箱送礼"
    }
}
RESULTINFO;

}