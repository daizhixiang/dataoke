<?php

namespace DaTaoKe\Requests\Dtk;

use DaTaoKe\Requests\DtkRequest;

/**
 * 官方活动会场转链
 */
class ActivityLink extends DtkRequest
{
    public $version = 'v1.0.0';
    public $api = 'tb-service/activity-link';
    /**
     * 额外参数文档
     * @var string
     */
    public $extraParasDocs = <<<EXTRAPARASDOCS
|名称|类型|必须|说明|
| ------------ | ------------ | ------------ | ------------ |
|promotionSceneId|String|是|联盟官方活动ID，从联盟官方活动页获取或从大淘客官方活动推广接口获取|
|title|String|是|活动名称（用于返回淘口令）|
|pid|String|否|推广位ID，用户授权淘宝账号的任一pid|
|relationId|string|否|渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认填入的渠道id是正确的|
|platform|String|否|1：PC，2：无线，默认：１|
|unionId|String|否|会场短标题（用于返回淘口令，需超过8个字符）|
EXTRAPARASDOCS;
    /**
     * 返回数据
     * @var string
     */
    public $resultDateDocs = <<<RESULTDATE
|名称|类型|示例值|说明|
| ------------ | ------------ | ------------ | ------------ |
|url|String|https://s.click.taobao.com/t?e=m%3D2%26s%3DOru2jZKXHE8cQipKwQzePCperVdZeJviyK8Cckff7TVRAdhuF14FMbfYdziKHvu51aH1Hk3GeOj%2BzUdmX8fsKoSN%2FfbvhJGuAnyrVGQ9gE1SzIuYnUOAFL3dJP8799J0pXXbv1mizeOdzyyO9CIkVU0PUbK0m8lKotYzDcQ4SzIk3ajAyOG5%2FNZAcBtK7CKQwmwBo7yXhWKQP%2Bu|二合一地址|
|taoCode|String|￥AADPOKFz￥|淘口令（字段有原来的tpwd变成taoCode）|
RESULTDATE;
    /**
     * 返回示例
     * @var string
     */
    public $resultInfoDocs = <<<RESULTINFO
{
    "time":1597376396930,
    "code":0,
    "msg":"成功",
    "data":{
        "url":"https://s.click.taobao.com/t?union_lens=lensId%3AOPT%401597376396%400b58a1c8_2783_173eb0d7e30_d2be%4001%3BeventPageId%3A20150318019999726&e=m%3D2%26s%3DG6oCw9vIjXlw4vFB6t2Z2iperVdZeJviU%2F9%2F0taeK29yINtkUhsv0Bg%2Fh7RHXastGwDk%2Bg6ahJszF7VM8z1XNnzBc4y68PjZT%2BIKTO6bJnSF%2FGzuRMXGMbA55BgRk2eBQ%2BNeRhkrKyfCg%2Fx6BHtN2eIKl4JSR4lzy0DxCSzwFgFd1le1%2FF%2FLHcvBfpBAMEs%2F8TNmwOY7eKvO54LQ%2FVw1L7rNOE9i8SvOEkEWzX%2FIvFU%2FF7Lz6F3ynK9NbmXcMIPfYP9aLI78J9Nvq%2B%2BVn76nmRvkw5f4RrZ3eItM%2FtBEzhE6wiSapEKmtOt4eSCC7sW7u%2F3XUcT5hrJ2n8tOKt%2B5BZbZmEQQQa%2Bz%2B0%2F08azWUkdxKmPmpIKZsA%3D%3D",
        "taoCode":"￥BMwQc1hxje1￥"
    }
}
RESULTINFO;

}