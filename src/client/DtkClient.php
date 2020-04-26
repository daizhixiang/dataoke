<?php

namespace Dtk\Client;

use Requests\BindSteategyClass;
use Http\Http;

class DtkClient
{
    //当前SDK版本
    const VERSION = "v1.0.0";

    public $appKey = '';
    public $appSecret = '';
    //策略对象
    public $strategyObj;
    //接口得到的数据
    public $data;

    public function __construct($appKey = null, $appSecret = null)
    {
        if ($appKey) $this->appKey = $appKey;
        if ($appSecret) $this->appSecret = $appSecret;
        // 执行初始化事件
        $this->onInitialize();
    }

    public function onInitialize()
    {
        if (!$this->appKey || !$this->appSecret) {
            throw new \InvalidArgumentException('AppKey和AppSecret不能为空');
        }
    }

    public function setSteategyObj(string $strategyObj, array $ExtraParas): self
    {
        $this->strategyObj = BindSteategyClass::$strategyObj();
        $ApiParas['appKey'] = $this->appKey;
        $ApiParas['version'] = $this->strategyObj->version;
        $this->strategyObj->setApiParas((array)$ApiParas);
        $this->strategyObj->setExtraParas($ExtraParas);
        return $this;
    }

    /**
     * 参数加密
     * @param $data
     * @return string
     */
    public function setSign($data): string
    {
        ksort($data);
        $str = '';
        foreach ($data as $k => $v) {
            $str .= '&' . $k . '=' . $v;
        }
        $str = trim($str, '&');
        $sign = strtoupper(md5($str . '&key=' . $this->appSecret));
        return $sign;
    }

    /**
     * 请求执行
     * @param array $requests
     * @return array
     */
    public function performRequests(): array
    {
        $request = $this->strategyObj->getRequestParas();
        $request['sign'] = $this->setSign($request);
        if ($this->strategyObj->requestMethod == "GET") {
            $data = Http::get($this->strategyObj->apiLink, $request);
        } else {
            $data = Http::post($this->strategyObj->apiLink, $request)->body;
        }
        $this->strategyObj->DataProcessing($data);
        return $this->strategyObj->apiData;
    }

}