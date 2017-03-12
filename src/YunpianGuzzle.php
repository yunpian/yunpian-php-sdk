<?php

namespace Yunpian\Sdk;

use \Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client;
use Yunpian\Sdk\Constant\YunpianConstant;

trait YunpianGuzzle{
    
    /**
     *
     * @var Client
     */
    private $http;
    
    /**
     * TODO not used
     * http charset
     *
     * @var string
     */
    private $charset;

    /**
     *
     * @param YunpianConf $conf            
     * @return \GuzzleHttp\Client
     */
    protected function initHttp(YunpianConf $conf) {
        $client = new Client($this->httpDefOptions($conf));
        
        $this->charset = $conf->conf(YunpianConstant::HTTP_CHARSET, YunpianConstant::HTTP_CHARSET_DEFAULT);
        $this->http = $client;
        return $client;
    }

    protected function httpDefOptions(YunpianConf $conf) {
        return [
            'headers' => [
                'Api-Lang' => 'php',
                'timeout' => intval($conf->conf(YunpianConstant::HTTP_SO_TIMEOUT, 30)),
                'connect_timeout' => intval($conf->conf(YunpianConstant::HTTP_SO_TIMEOUT, 10)) 
            ] 
        ];
        // 'Content-Type' => 'application/x-www-form-urlencoded'
    }

    /**
     * TODO charset headers
     *
     * @param string $uri            
     * @param array $data            
     * @param string $charset            
     * @param array $headers            
     * @param string $parse
     *            Parsing function for Response, as if toJson
     * @return \Psr\Http\Message\ResponseInterface | mixed
     */
    function post($uri, array $data, $charset = YunpianConstant::HTTP_CHARSET_DEFAULT, array $headers, $parse = "toJson") {
        // if (is_null($charset)) {
        // $charset = $this->charset;
        // }
        $rsp = $this->http()->post($uri, [
            'form_params' => $data 
        ]);
        return is_null($parse) ? $rsp : $this->$parse($rsp);
    }

    /**
     *
     * @param ResponseInterface $rsp            
     * @return mixed
     */
    function toJson(ResponseInterface $rsp) {
        return \GuzzleHttp\json_decode($rsp->getBody()->getContents(), true);
    }

    /**
     *
     * @return \GuzzleHttp\Client
     */
    function http() {
        return $this->http;
    }

}