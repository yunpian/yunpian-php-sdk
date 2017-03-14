<?php

namespace Yunpian\Sdk\Api;

/**
 *
 * @author dzh
 * @since 1.0
 */
class ApiFactory {
    
    private $clnt;

    function __construct($clnt) {
        $this->clnt = $clnt;
    }

    function api($name) {
        $api = null;
        switch ($name) {
            case FlowApi::NAME:
                $api = new FlowApi();
                break;
            case SignApi::NAME:
                $api = new SignApi();
                break;
            case SmsApi::NAME:
                $api = new SmsApi();
                break;
            case TplApi::NAME:
                $api = new TplApi();
                break;
            case UserApi::NAME:
                $api = new UserApi();
                break;
            case VoiceApi::NAME:
                $api = new VoiceApi();
                break;
            default:
                $api = new VoidApi();
        }
        
        $api->init($this->clnt);
        return $api;
    }

}
