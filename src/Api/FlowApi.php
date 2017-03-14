<?php

namespace Yunpian\Sdk\Api;

use Yunpian\Sdk\Model\Result;
use Yunpian\Sdk\YunpianClient;

/**
 * https://www.yunpian.com/api2.0/api-flow.html
 *
 * @author dzh
 * @since 1.0
 */
class FlowApi extends YunpianApi {
    
    const NAME = "flow";

    function init(YunpianClient $clnt) {
        parent::init($clnt);
        $this->host($clnt->conf(self::YP_FLOW_HOST, 'https://flow.yunpian.com'));
    }

    function name() {
        return self::NAME;
    }

    /**
     * <h1>查询流量包</h1>
     *
     * <p>
     * 参数名 类型 是否必须 描述 示例
     * </p>
     * <p>
     * apikey String 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     * <p>
     * carrier String 否 运营商ID 传入该参数则获取指定运营商的流量包， 否则获取所有运营商的流量包 移动：10086 联通：10010
     * 电信：10000
     * </p>
     *
     * @param array $param            
     * @return Result
     *
     */
    function get_package(array $param = []) {
        static $must = [self::APIKEY];
        $r = $this->verifyParam($param, $must);
        if (!$r->isSucc()) return $r;
        
        $v = $this->version();
        $h = new CommonResultHandler(function ($rsp) use ($v) {
            switch ($v) {
                case self::VERSION_V1:
                    return $rsp[self::FLOW_PACKAGE];
                case self::VERSION_V2:
                    return $rsp;
            }
            return null;
        });
        return $this->path('get_package.json')->post($param, $h, $r);
    }

    /**
     * <h1>充值流量</h1>
     *
     * <p>
     * 参数名 类型 是否必须 描述 示例
     * </p>
     * <p>
     * apikey String 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     * <p>
     * mobile String 是 接收的手机号（仅支持大陆号码） 15205201314
     * </p>
     * <p>
     * sn String 是 流量包的唯一ID 点击查看 1008601
     * </p>
     * <p>
     * callback_url String 否 本条流量充值的状态报告推送地址 http://your_receive_url_address
     * </p>
     * <p>
     * encrypt String 否 加密方式 使用加密 tea (不再使用)
     * </p>
     * <p>
     * _sign String 否 签名字段 参考使用加密 393d079e0a00912335adfe46f4a2e10f (不再使用)
     * </p>
     *
     * @param array $param            
     * @return Result
     *
     */
    function recharge(array $param = []) {
        static $must = [self::APIKEY,self::MOBILE];
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
        return $this->path('recharge.json')->post($param, $h, $r);
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
     *
     */
    function pull_status(array $param = []) {
        static $must = [self::APIKEY];
        $r = $this->verifyParam($param, $must);
        if (!$r->isSucc()) return $r;
        
        $v = $this->version();
        $h = new CommonResultHandler(function ($rsp) use ($v) {
            switch ($v) {
                case self::VERSION_V1:
                    return $rsp[self::FLOW_STATUS];
                case self::VERSION_V2:
                    return $rsp;
            }
            return null;
        });
        return $this->path('pull_status.json')->post($param, $h, $r);
    }

}