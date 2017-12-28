<?php

namespace Yunpian\Sdk;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Yunpian\Sdk\Constant\YunpianConstant;

/**
 *
 * @author dzh
 * @since 1.0
 */
trait YunpianGuzzle {

    /**
     *
     * @var Client
     */
    private $http;

    /**
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
        return ['headers' => ['Api-Lang'        => 'php',
                              'timeout'         => intval($conf->conf(YunpianConstant::HTTP_SO_TIMEOUT, 30)),
                              'connect_timeout' => intval($conf->conf(YunpianConstant::HTTP_CONN_TIMEOUT, 10))]];
        // 'Content-Type' => 'application/x-www-form-urlencoded'
    }

    /**
     *
     * @param string $uri
     * @param array $data
     * @param string $charset
     * @param array $headers
     * @param string $parse
     *            Parsing function for Response, as if toJson
     * @return mixed
     */
    function post($uri, array &$data, $charset = null, array &$headers = null, $parse = "toJson") {
        if (is_null($charset)) {
            $charset = $this->charset;
        }
        if (is_null($headers)) {
            $headers = ['Content-Type' => "application/x-www-form-urlencoded;charset=$charset"];
        }

        $options = ['debug' => false, '_conditional' => $headers];

        if ($headers['Content-Type'] == 'multipart/form-data') {
            $options['multipart'] = $data;
        }
        else {
            $options['form_params'] = $data;
        }

        try {
            $rsp = $this->http()->post($uri, $options);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $rsp = $e->getResponse();
        }
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