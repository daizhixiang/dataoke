<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 淘口令解析
 */
class ParseTaokouling extends DtkRequest
{
    public $version = 'v1.0.0';
    public $api = 'tb-service/parse-taokouling';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|content|String|是|包含淘口令的文本。 若文本中有多个淘口令，仅解析第一个。（目前仅支持商品口令和二合一券口令）|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|goodsId|String|625171500599|淘宝商品ID|
|originUrl|String|https://s.click.taobao.com/lHlLAxu|链接|
|originType|String|二合一券|链接中的信息类型|
|originInfo|String||链接中的信息|
|originInfo.title|String|鲜品屋广式月饼散装多口味流心送礼1020g双黄白莲蓉中秋月饼礼盒|商品标题|
|originInfo.shopName|String|臻味食品旗舰店|店铺名|
|originInfo.shopLogo|String|https://gw.alicdn.com//7c/bb/TB11e7nOFXXXXXDXpXXwu0bFXXX.png|店铺LOGO图|
|originInfo.image|String|https://img.alicdn.com/bao/uploaded/i3/1699225083/O1CN012kwBYi1nQ3owHYvGb_!!0-item_pic.jpg|商品主图|
|originInfo.startTime|String|2020-08-27 00:00:00|券开始时间|
|originInfo.endTime|String|2020-08-27 23:59:59|券结束时间|
|originInfo.amount|Number|10|券金额|
|originInfo.startFee|Number|29|券门槛金额|
|originInfo.price|Number|29.9|商品价格|
|originInfo.activityId|String|160429358dbc4d9f89a2d582f674bafb|券ID|
|originInfo.pid|String|mm_30330467_520850264_108918300378|PID|
|originInfo.status|Number|0|券状态。0:可用; 非0:不可用|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "code":0,
    "data":{
        "commissionRate":20,
        "commissionType":"MKT",
        "goodsId":"541297998676",
        "originInfo":{
            "activityId":"0f75a182319b422a8a2daa57245e21a7",
            "amount":3,
            "endTime":"2020-07-28 23:59:59",
            "image":"https://img.alicdn.com/bao/uploaded/i1/3017400344/O1CN01tFqf3G1EParIBkZXM_!!0-item_pic.jpg",
            "pid":"mm_30330467_520850264_108918300378",
            "price":34.83,
            "shopLogo":"https://gw.alicdn.com//92/ab/TB1bIGGOXXXXXasXFXXSutbFXXX.jpg",
            "shopName":"好欢螺旗舰店",
            "startFee":30,
            "startTime":"2020-07-22 00:00:00",
            "status":0,
            "title":"好欢螺螺蛳粉柳州特产螺狮粉酸辣粉300gx3袋速食螺丝粉方便面米线"
        },
        "originType":"二合一券",
        "originUrl":"https://uland.taobao.com/coupon/edetail?e=GRpMEmIn6G4GQASttHIRqVyBQFbzEoB7yE8ze9rkZCTDLwEgKWfbRfj%2BE%2FMkGpW5Na4vajnw0JotkFtpL6gEnbNcupgyd%2B1qWv9OAj9evKDahba4h8MrZ%2Bdth9k8bqqSHKTgBzHkoM7XTQC0vfau6E%2F9Zk7cDx8UPrKiYwdarE%2FmZlrHb6YhPHui%2Fn%2FQ7Z5Vh4inBowG%2Bk%2Bz%2BEEIX1kmAg%3D%3D&traceId=0bb6a98415953819325498447e4db4&union_lens=lensId:TAPI@1595381932@0b5a317b_0d7a_173742c621c_d260@01&xId=5KcVIs0vBgEM4iUVFITEfr00ZdvkqiPbSU4ZYKwhY83jyw90hAx9uZXdiJu2IM54M8WcpeRRhiXmcFsYcJnf2MARapaCrMnBo1oLW4o71HW1&activityId=0f75a182319b422a8a2daa57245e21a7&src=qhkj_dtkp&un=2e11e09e6bec9bc14623f433a4270ff2&share_crt_v=1&ut_sk=1.utdid_28131718_1595381932648.TaoPassword-Outside.taoketop&spm=a2159r.13376465.0.0&sp_tk=ZHlsdDFBY3gwUU8=&bxsign=tcd15953838702565fb790aed72a00bbf65fe2e0c8874434"
    },
    "msg":"成功",
    "time":1595383870566
}
RESULTINFO;

}