<?php

namespace Yunpian\Sdk\Api;

use Yunpian\Sdk\Model\Result;
use Yunpian\Sdk\YunpianClient;

/**
 * https://www.yunpian.com/api2.0/user.html
 * 
 * @author dzh
 * @since 1.0
 */
class UserApi extends YunpianApi {
    
    const NAME = "user";

    function init(YunpianClient $clnt) {
        parent::init($clnt);
        $this->host($clnt->conf(self::YP_USER_HOST, 'https://sms.yunpian.com'));
    }

    function name() {
        return self::NAME;
    }

    /**
     * <h1>查账户信息</h1>
     *
     * <p>
     * 参数名 类型 是否必须 描述 示例
     * </p>
     * <p>
     * apikey String 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     *
     * @return Result
     *
     */
    function get($param = []) {
        static $must = [self::APIKEY];
        $r = $this->verifyParam($param, $must);
        if (!$r->isSucc()) return $r;
        
        $v = $this->version();
        $h = new CommonResultHandler(function ($rsp) use ($v) {
            switch ($v) {
                case self::VERSION_V1:
                    return $rsp[self::USER];
                case self::VERSION_V2:
                    return $rsp;
            }
            return null;
        });
        
        return $this->path('get.json')->post($param, $h, $r);
    }

    /**
     * <h1>修改账户信息</h1>
     *
     * <p>
     * 参数名 类型 是否必须 描述 示例
     * </p>
     * <p>
     * apikey String 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     * <p>
     * emergency_contact String 否 紧急联系人 zhangshan
     * </p>
     * <p>
     * emergency_mobile String 否 紧急联系人手机号 13012345678
     * </p>
     * <p>
     * alarm_balance Long 否 短信余额提醒阈值。 一天只提示一次 100
     * </p>
     *
     * @param array $param
     *            emergency_contact emergency_mobile alarm_balance
     * @return Result
     *
     */
    function set(array $param = []) {
        static $must = [self::APIKEY];
        $r = $this->verifyParam($param, $must);
        if (!$r->isSucc()) return $r;
        
        $v = $this->version();
        $h = new CommonResultHandler(function ($rsp) use ($v) {
            switch ($v) {
                case self::VERSION_V2:
                    return $rsp;
            }
            return null;
        });
        return $this->path('set.json')->post($param, $h, $r);
    }

}