<?php

namespace Yunpian\Sdk;

/**
 *
 * @author dzh
 * @since 1.0
 */
class YunpianClient implements Constant\YunpianConstant {
    use YunpianGuzzle;
    
    /**
     *
     * @var ApiFactory
     */
    private $api;
    
    /**
     *
     * @var YunpianConf
     */
    private $conf;

    function __construct() {
        $this->api = new Api\ApiFactory($this);
        $this->conf = new YunpianConf();
    }

    /**
     * Initialize/Create YunpianClient
     *
     * @param string $apikey            
     * @param array $conf            
     * @return \Yunpian\SDK\YunpianClient
     */
    static function create($apikey, array $conf = []) {
        $clnt = new YunpianClient();
        $clnt->conf->init()->with($apikey, $conf);
        $clnt->initHttp($clnt->conf); // YunpianGuzzle->initHttp
        return $clnt;
    }

    /**
     *
     * @param string $name            
     * @return \Yunpian\Sdk\Api\YunpianApi
     */
    private function api($name) {
        return $this->api->api($name);
    }

    /**
     *
     * @return SmsApi
     */
    function sms() {
        return $this->api(Api\SmsApi::NAME);
    }

    /**
     *
     * @return UserApi
     */
    function user() {
        return $this->api(Api\UserApi::NAME);
    }

    /**
     *
     * @return VoiceApi
     */
    function voice() {
        return $this->api(Api\VoiceApi::NAME);
    }

    /**
     *
     * @return SignApi
     */
    function sign() {
        return $this->api(Api\SignApi::NAME);
    }

    /**
     *
     * @return TplApi
     */
    function tpl() {
        return $this->api(Api\TplApi::NAME);
    }

    /**
     *
     * @return FlowApi
     */
    function flow() {
        return $this->api(Api\FlowApi::NAME);
    }

    function conf($key = null) {
        return is_null($key) ? $this->conf : $this->conf->conf($key);
    }

    function apikey() {
        return $this->conf->apikey();
    }

    function __destruct() {
        // print "Destroying $this\n";
    }

    function __toString() {
        return "YunpianClient-{$this->apikey()}";
    }

}

