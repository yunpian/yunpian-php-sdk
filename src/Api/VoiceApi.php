<?php

namespace Yunpian\Sdk\Api;

use Yunpian\Sdk\Model\Result;
use Yunpian\Sdk\YunpianClient;

/**
 * https://www.yunpian.com/api2.0/voice.html
 *
 * @author dzh
 * @since 1.0
 */
class VoiceApi extends YunpianApi {
    
    const NAME = "voice";

    function init(YunpianClient $clnt) {
        parent::init($clnt);
        $this->host($clnt->conf(self::YP_VOICE_HOST, 'https://voice.yunpian.com'));
    }

    function name() {
        return self::NAME;
    }

    /**
     * <h1>发语音验证码</h1>
     *
     * <p>
     * 参数名 类型 是否必须 描述 示例
     * </p>
     * <p>
     * apikey String 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     * <p>
     * mobile String 是 接收的手机号、固话（需加区号） 15205201314 01088880000
     * </p>
     * <p>
     * code String 是 验证码，支持4~6位阿拉伯数字 1234
     * </p>
     * <p>
     * encrypt String 否 加密方式 使用加密 tea (不再使用)
     * </p>
     * <p>
     * _sign String 否 签名字段 参考使用加密 393d079e0a00912335adfe46f4a2e10f (不再使用)
     * </p>
     * <p>
     * callback_url String 否 本条语音验证码状态报告推送地址 http://your_receive_url_address
     * </p>
     * <p>
     * display_num String 否 透传号码，为保证全国范围的呼通率，云片会自动选择最佳的线路，透传的主叫号码也会相应变化。
     * 如需透传固定号码则需要单独注册报备，为了确保号码真实有效，客服将要求您使用报备的号码拨打一次客服电话
     * </p>
     *
     * @param array $param            
     * @return Result
     */
    function send(array $param) {
        static $must = [self::APIKEY,self::MOBILE,self::CODE];
        $r = $this->verifyParam($param, $must);
        if (!$r->isSucc()) return $r;
        
        $v = $this->version();
        $h = new CommonResultHandler(function ($rsp) use ($v) {
            switch ($v) {
                case self::VERSION_V1:
                    return $rsp[self::RESULT];
                case self::VERSION_V2:
                    return $rsp;
            }
            return null;
        });
        return $this->path("send.json")->post($param, $h, $r);
    }

    /**
     * <h1>获取状态报告</h1>
     *
     * <p>
     * 参数名 是否必须 描述 示例
     * </p>
     * <p>
     * apikey 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     * <p>
     * page_size 否 每页个数，最大100个，默认20个 20
     * </p>
     *
     * @param array $param            
     * @return Result
     */
    function pull_status(array $param) {
        static $must = [self::APIKEY];
        $r = $this->verifyParam($param, $must);
        if (!$r->isSucc()) return $r;
        
        $v = $this->version();
        $h = new CommonResultHandler(function ($rsp) use ($v) {
            switch ($v) {
                case self::VERSION_V1:
                    return $rsp[self::VOICE_STATUS];
                case self::VERSION_V2:
                    return $rsp;
            }
            return null;
        });
        return $this->path("pull_status.json")->post($param, $h, $r);
    }

}