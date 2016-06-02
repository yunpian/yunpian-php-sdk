<?php
/** 获取用户信息
 * Created by PhpStorm.
 * User: bingone
 * Date: 16/1/20
 * Time: 上午10:11
 */

//namespace Yunpian\lib;

require_once 'HttpUtil.php';
class UserOperator
{
    public $apikey;
    public $api_secret;
    public $yunpian_config;
    public function __construct($apikey=null,$api_secret=null)
    {
        $this->yunpian_config = $GLOBALS['YUNPIAN_CONFIG'];
        if($api_secret == null)
            $this->api_secret = $this->yunpian_config['API_SECRET'];
        else
            $this->api_secret = $api_secret;
        if($apikey == null)
            $this->apikey = $this->yunpian_config['APIKEY'];
        else
            $this->apikey = $apikey;
    }
    public function encrypt(&$data){

    }
    public function get($data=array()){
        $data['apikey'] = $this->apikey;

        return HttpUtil::PostCURL($this->yunpian_config['URI_GET_USER_INFO'],$data);
    }
    public function set($data=array()){
        $data['apikey'] = $this->apikey;
        return HttpUtil::PostCURL($this->yunpian_config['URI_SET_USER_INFO'],$data);
    }
}
?>