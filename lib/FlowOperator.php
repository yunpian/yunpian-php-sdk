<?php

/**流量发送方式
 * Created by PhpStorm.
 * User: bingone
 * Date: 16/1/19
 * Time: 下午5:42
 */
class FlowOperator
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
            $this->api_secret = $api_secret;
        if ($apikey == null)
            $this->apikey = $this->yunpian_config['APIKEY'];
        else
            $this->apikey = $apikey;
    }

    public function encrypt(&$data)
    {

    }

    public function get_package($data=array())
    {
        $data['apikey'] = $this->apikey;

        return HttpUtil::PostCURL($this->yunpian_config['URI_GET_FLOW_PACKAGE'], $data);
    }

    public function pull_status($data=array())
    {
        $data['apikey'] = $this->apikey;
        return HttpUtil::PostCURL($this->yunpian_config['URI_PULL_FLOW_STATUS'], $data);
    }

    public function recharge($data=array())
    {
        if (!array_key_exists('mobile', $data))
            return new Result(null,$data,null,$error = 'mobile 为空');

        $data['apikey'] = $this->apikey;
        return HttpUtil::PostCURL($this->yunpian_config['URI_RECHARGE_FLOW'], $data);
    }
}
