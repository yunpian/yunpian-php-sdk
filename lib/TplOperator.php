<?php
/**
 * Created by PhpStorm.
 * User: bingone
 * Date: 16/1/20
 * Time: 上午10:37
 */
require_once 'HttpUtil.php';

class TplOperator
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
    public function get_default($data = array())
    {
        $data['apikey'] = $this->apikey;

        return HttpUtil::PostCURL($this->yunpian_config['URI_GET_DEFAULT_TEMPLATE'], $data);
    }
    public function get($data = array())
    {
        $data['apikey'] = $this->apikey;

        return HttpUtil::PostCURL($this->yunpian_config['URI_GET_TEMPLATE'], $data);
    }

    public function add($data = array())
    {
        if (!array_key_exists('tpl_id',$data))
            return new Result(null,$data,null,$error = 'tpl_id 为空');
        if (!array_key_exists('tpl_content',$data))
            return new Result(null,$data,null,$error = 'tpl_content 为空');
        $data['apikey'] = $this->apikey;
        return HttpUtil::PostCURL($this->yunpian_config['URI_ADD_TEMPLATE'], $data);
    }

    public function upd($data = array())
    {
        if (!array_key_exists('tpl_id',$data))
            return new Result(null,$data,null,$error = 'tpl_id 为空');
        if (!array_key_exists('tpl_content',$data))
            return new Result(null,$data,null,$error = 'tpl_content 为空');
        $data['apikey'] = $this->apikey;
        return HttpUtil::PostCURL($this->yunpian_config['URI_UPD_TEMPLATE'], $data);
    }

    public function del($data = array())
    {
        if (!array_key_exists('tpl_id',$data))
            return new Result(null,$data,null,$error = 'tpl_id 为空');
        $data['apikey'] = $this->apikey;

        return HttpUtil::PostCURL($this->yunpian_config['URI_DEL_TEMPLATE'], $data);
    }

}