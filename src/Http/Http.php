<?php

namespace DaTaoKe\Http;


class Http
{
    public $url = '';
    public $query = [];
    public $options = [];
    public $data = [];
    public $method = '';

    public static function init()
    {
        return new self;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    public function setQuery(array $query)
    {
        $this->query = $query;
        return $this;
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function setMethod(string $method)
    {
        $this->method = $method;
        return $this;
    }

    public function execute()
    {
        if ('get' == strtolower($this->method)) {
            $this->options['query'] = $this->query;
        } elseif ('post' == strtolower($this->method)) {
            $this->options['data'] = $this->data;
        }
        return self::request($this->method, $this->url, $this->options);
    }

    /**
     * CURL模拟网络请求
     * @param string $method 请求方法
     * @param string $url 请求方法
     * @param array $options 请求参数[header,data,ssl_cer,ssl_key]
     * @return bool|string
     */
    public static function request($method, $url, $options = [])
    {
        $curl = curl_init();
        // GET参数设置
        if (!empty($options['query'])) {
            $url .= stripos($url, '?') !== false ? '&' : '?' . http_build_query($options['query']);
        }
        // POST数据设置
        if (strtolower($method) === 'post') {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, self::build($options['data']));
        }
        // 请求超时设置
        $options['timeout'] = isset($options['timeout']) ? $options['timeout'] : 60;
        curl_setopt($curl, CURLOPT_TIMEOUT, $options['timeout']);
        // CURL头信息设置
        if (!empty($options['header'])) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $options['header']);
        }
        // 证书文件设置
        if (!empty($options['ssl_cer']) && file_exists($options['ssl_cer'])) {
            curl_setopt($curl, CURLOPT_SSLCERTTYPE, 'PEM');
            curl_setopt($curl, CURLOPT_SSLCERT, $options['ssl_cer']);
        }
        if (!empty($options['ssl_key']) && file_exists($options['ssl_key'])) {
            curl_setopt($curl, CURLOPT_SSLKEYTYPE, 'PEM');
            curl_setopt($curl, CURLOPT_SSLKEY, $options['ssl_key']);
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //函数中加入下面这条语句
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        list($content, $status) = [curl_exec($curl), curl_getinfo($curl), curl_close($curl)];

        return (intval($status["http_code"]) === 200) ? $content : false;
    }

    /**
     * POST数据过滤处理
     * @param array $data
     * @param bool $needBuild
     * @return array
     */
    private static function build($data, $needBuild = true)
    {
        if (!is_array($data)) {
            return $data;
        }
        foreach ($data as $key => $value) {
            if (is_string($value) && class_exists('CURLFile', false) && stripos($value, '@') === 0) {
                if (($filename = realpath(trim($value, '@'))) && file_exists($filename)) {
                    list($needBuild, $data[$key]) = [false, new \CURLFile($filename)];
                }
            }
        }
        return $needBuild ? http_build_query($data) : $data;
    }

}