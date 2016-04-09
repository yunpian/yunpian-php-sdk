<?php
/**
 * Created by PhpStorm.
 * User: bingone
 * Date: 16/1/19
 * Time: 下午5:42
 */

require_once 'HttpUtil.php';

class VoiceOperator
{
    public $apikey;
    public $api_secret;
    public $yunpian_config;

    public function __construct($apikey = null, $api_secret = null)
    {
        $this->yunpian_config = $GLOBALS['YUNPIAN_CONFIG'];
        if ($api_secret == null)
            $this->api_secret = $this->yunpian_config['API_SECRET'];
        else
            $this->api_secret = $apikey;
        if ($apikey == null)
            $this->apikey = $this->yunpian_config['APIKEY'];
        else
            $this->apikey = $api_secret;
    }

    public function encrypt(&$data)
    {

    }

    public function send($data=array())
    {
        if (!array_key_exists('mobile', $data))
            return new Result($error = 'mobile 为空');
        if (!array_key_exists('code', $data))
            return new Result($error = 'code 为空');
        $data['apikey'] = $this->apikey;
//        encrypt($data);
        return HttpUtil::PostCURL($this->yunpian_config['URI_SEND_VOICE_SMS'], $data);
    }

    public function pull_status($data=array())
    {
        $data['apikey'] = $this->apikey;
        return HttpUtil::PostCURL($this->yunpian_config['URI_PULL_VOICE_STATUS'], $data);
    }

}
