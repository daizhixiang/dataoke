<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 订单查询接口
 */
class GetOrderDetails extends DtkRequest
{
    public $version = 'v1.0.0';
    public $api = 'tb-service/get-order-details';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|queryType|Number|否|查询时间类型，1：按照订单淘客创建时间查询，2:按照订单淘客付款时间查询，3:按照订单淘客结算时间查询|
|positionIndex|String|否|位点，除第一页之外，都需要传递；前端原样返回。|
|pageSize|Number|否|页大小，默认20，1~100|
|memberType|Number|否|推广者角色类型,2:二方，3:三方，不传，表示所有角色|
|tkStatus|Number|否|淘客订单状态，12-付款，13-关闭，14-确认收货，3-结算成功;不传，表示所有状态|
|endTime|String|是|订单查询结束时间，订单开始时间至订单结束时间，中间时间段日常要求不超过3个小时，但如618、双11、年货节等大促期间预估时间段不可超过20分钟，超过会提示错误，调用时请务必注意时间段的选择，以保证亲能正常调用！ 时间格式：YYYY-MM-DD HH:MM:SS|
|startTime|String|是|订单查询开始时间。时间格式：YYYY-MM-DD HH:MM:SS|
|jumpType|Number|否|跳转类型，当向前或者向后翻页必须提供,-1: 向前翻页,1：向后翻页|
|pageNo|Number|否|第几页，默认1，1~100|
|orderScene|Number|否|场景订单场景类型，1:常规订单，2:渠道订单，3:会员运营订单，默认为1|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|tb_paid_time|String|2019-04-22 15:15:05|订单在淘宝拍下付款的时间|
|tk_paid_time|String|2019-04-22 15:15:05|订单付款的时间，该时间同步淘宝，可能会略晚于买家在淘宝的订单创建时间|
|pay_price|String|9.11|买家确认收货的付款金额（不包含运费金额）|
|pub_share_fee|String|0|结算预估收入=结算金额×提成。以买家确认收货的付款金额为基数，预估您可能获得的收入。因买家退款、您违规推广等原因，可能与您最终收入不一致。最终收入以月结后您实际收到的为准|
|trade_id|String|294159887445064307|买家通过购物车购买的每个商品对应的订单编号，此订单编号并未在淘宝买家后台透出|
|tk_order_role|Number|2|二方：佣金收益的第一归属者； 三方：从其他淘宝客佣金中进行分成的推广者|
|tk_earning_time|String|2019-04-22 15:15:05|订单确认收货后且商家完成佣金支付的时间|
|adzone_id|Number|11|推广位管理下的推广位名称对应的ID，同时也是pid=mm_1_2_3中的“3”这段数字|
|pub_share_rate|String|100|从结算佣金中分得的收益比率|
|refund_tag|Number|0|维权标签，0 含义为非维权 1 含义为维权订单|
|subsidy_rate|String|0|平台给与的补贴比率，如天猫、淘宝、聚划算等|
|tk_total_rate|String|9.99|提成=收入比率×分成比率。指实际获得收益的比率|
|item_category_name|String|淘小铺|商品所属的根类目，即一级类目的名称|
|seller_nick|String|--|掌柜旺旺|
|pub_id|Number|98836808|推广者的会员id|
|alimama_rate|String|0|推广者赚取佣金后支付给阿里妈妈的技术服务费用的比率|
|subsidy_type|String|--|平台出资方，如天猫、淘宝、或聚划算等|
|item_img|String|//img.alicdn.com/bao/uploaded/i1/2200782262419/O1CN01b5qlop1TjwarUo8fo_!!2200782262419.jpg|商品图片|
|pub_share_pre_fee|String|0|付款预估收入=付款金额×提成。指买家付款金额为基数，预估您可能获得的收入。因买家退款等原因，可能与结算预估收入不一致|
|alipay_total_price|String|11.22|买家拍下付款的金额（不包含运费金额）|
|item_title|String|tsh_rj_测试请不要拍_阶佣11.1|商品标题|
|site_name|String|合伙人|媒体管理下的对应ID的自定义名称|
|item_num|Number|10|商品数量|
|subsidy_fee|String|0|补贴金额=结算金额×补贴比率|
|alimama_share_fee|String|0|技术服务费=结算金额×收入比率×技术服务费率。推广者赚取佣金后支付给阿里妈妈的技术服务费用|
|trade_parent_id|String|294159887445064307|买家在淘宝后台显示的订单编号|
|order_type|String|如意淘|订单所属平台类型，包括天猫、淘宝、聚划算等|
|tk_create_time|String|2019-04-22 15:15:05|订单创建的时间，该时间同步淘宝，可能会略晚于买家在淘宝的订单创建时间|
|flow_source|String|--|产品类型|
|terminal_type|String|无线|成交平台|
|click_time|String|2019-04-22 15:14:55|通过推广链接达到商品、店铺详情页的点击时间|
|tk_status|Number|13|已付款：指订单已付款，但还未确认收货 已收货：指订单已确认收货，但商家佣金未支付 已结算：指订单已确认收货，且商家佣金已支付成功 已失效：指订单关闭/订单佣金小于0.01元，订单关闭主要有：1）买家超时未付款； 2）买家付款前，买家/卖家取消了订单；3）订单付款后发起售中退款成功；3：订单结算，12：订单付款， 13：订单失效，14：订单成功|
|item_price|String|2.1|商品单价|
|item_id|Number|590141576510|商品id|
|adzone_name|String|--|推广位管理下的自定义推广位名称|
|total_commission_rate|String|9.9|佣金比率|
|item_link|String|--|商品链接|
|site_id|Number|45598009|媒体管理下的ID，同时也是pid=mm_1_2_3中的“2”这段数字|
|seller_shop_title|String|--|店铺名称|
|income_rate|String|9.99|订单结算的佣金比率+平台的补贴比率|
|total_commission_fee|String|0|佣金金额=结算金额＊佣金比率|
|tk_commission_pre_fee_for_media_platform|String|1.05|预估内容专项服务费：内容场景专项技术服务费，内容推广者在内容场景进行推广需要支付给阿里妈妈专项的技术服务费用。专项服务费＝付款金额＊专项服务费率。|
|tk_commission_fee_for_media_platform|String|1.05|结算内容专项服务费：内容场景专项技术服务费，内容推广者在内容场景进行推广需要支付给阿里妈妈专项的技术服务费用。专项服务费＝结算金额＊专项服务费率。|
|tk_commission_rate_for_media_platform|String|0.01|内容专项服务费率：内容场景专项技术服务费率，内容推广者在内容场景进行推广需要按结算金额支付一定比例给阿里妈妈作为内容场景专项技术服务费，用于提供与内容平台实现产品技术对接等服务。|
|special_id|Number|2323|会员运营id|
|relation_id|Number|2323|渠道关系id|
|tk_deposit_time|String|2019-09-09 12:01:01|预售时期，用户对预售商品支付定金的付款时间，可能略晚于在淘宝付定金时间|
|tb_deposit_time|String|2019-09-09 12:01:01|预售时期，用户对预售商品支付定金的付款时间|
|deposit_price|String|122.22|预售时期，用户对预售商品支付的定金金额|
|app_key|String|122121|开发者调用api的appkey|
|alsc_id|String|2332|口碑子订单号|
|alsc_pid|String|32324|口碑父订单号|
|service_fee_dto_list|ServiceFeeDto|ServiceFeeDto|服务费信息|
|share_relative_rate|String|0.1|专项服务费率|
|share_fee|String|11.11|结算专项服务费|
|share_pre_fee|String|11.11|预估专项服务费|
|tk_share_role_type|Number|122|专项服务费来源，122-渠道|
|has_pre|Boolean|false|是否还有上一页|
|position_index|String|1555904214_lGltNdNvSX2|1555917305_lJfPMeFmdt2|位点字段，由调用方原样传递|
|has_next|Boolean|true|是否还有下一页|
|page_no|Number|1|页码|
|page_size|Number|11|页大小|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time":1594891757171,
    "code":0,
    "msg":"成功",
    "data":{
        "has_pre":false,
        "has_next":true,
        "page_no":1,
        "results":{
            "publisher_order_dto":[
                {
                    "terminal_type":"无线",
                    "item_category_name":"洗护清洁剂/卫生巾/纸/香薰",
                    "tk_paid_time":"2020-07-10 18:53:03",
                    "adzone_id":53457500119,
                    "alipay_total_price":"32.64",
                    "seller_shop_title":"众九州医药保健",
                    "alimama_share_fee":"0.05",
                    "trade_id":"1112294658659816352",
                    "click_time":"2020-07-10 18:51:58",
                    "subsidy_rate":"0.00",
                    "refund_tag":0,
                    "item_title":"【3支装】厦门美商薄荷膏清凉提神醒脑防困防瞌睡防蚊考研旅游",
                    "order_type":"淘宝",
                    "tb_paid_time":"2020-07-10 18:52:53",
                    "tk_order_role":2,
                    "total_commission_fee":"0.00",
                    "pub_id":116971121,
                    "item_img":"//img.alicdn.com/tfscom/i3/54701812/O1CN01XDhkj51PFwGekZJtr_!!54701812.jpg",
                    "alimama_rate":"10.00",
                    "item_id":43907626661,
                    "item_price":"40.80",
                    "tb_deposit_time":"--",
                    "tk_status":12,
                    "total_commission_rate":"1.50",
                    "trade_parent_id":"1112294658659816352",
                    "subsidy_type":"--",
                    "tk_create_time":"2020-07-10 18:52:56",
                    "pub_share_fee":"0.00",
                    "item_num":1,
                    "tk_commission_fee_for_media_platform":"0.00",
                    "income_rate":"1.50",
                    "site_name":"番薯君",
                    "pub_share_pre_fee":"0.49",
                    "tk_commission_rate_for_media_platform":"0.00",
                    "tk_deposit_time":"--",
                    "tk_total_rate":"1.50",
                    "pub_share_rate":"100.00",
                    "adzone_name":"番薯君优惠器",
                    "site_id":24922285,
                    "item_link":"http://item.taobao.com/item.htm?id=43907626661",
                    "deposit_price":"0.00",
                    "seller_nick":"歌手2007",
                    "subsidy_fee":"0.00",
                    "flow_source":"--",
                    "tk_commission_pre_fee_for_media_platform":"0.00"
                }
            ]
        },
        "position_index":"1594377600_IfQpGv889W2|1594378376_1kajVdFgapW2",
        "page_size":2
    }
}
RESULTINFO;

}