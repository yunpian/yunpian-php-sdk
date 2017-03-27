<?php

namespace Yunpian\Sdk\Api;

use Yunpian\Sdk\Model\Result;
use Yunpian\Sdk\YunpianClient;

/**
 * https://www.yunpian.com/api2.0/tpl.html
 *
 * @author dzh
 * @since 1.0
 */
class TplApi extends YunpianApi {
    
    const NAME = "tpl";

    function init(YunpianClient $clnt) {
        parent::init($clnt);
        $this->host($clnt->conf(self::YP_TPL_HOST, 'https://sms.yunpian.com'));
    }

    function name() {
        return self::NAME;
    }

    /**
     * <h1>取默认模板</h1>
     * <p>
     * 参数名 类型 是否必须 描述 示例
     * </p>
     * <p>
     * apikey String 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     * <p>
     * tpl_id Long 否 模板id，64位长整形。指定id时返回id对应的默认 模板。未指定时返回所有默认模板 1
     * </p>
     *
     * @param array $param
     *            tpl_id
     * @return
     *
     */
    function get_default(array $param) {
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
        return $this->path("get_default.json")->post($param, $h, $r);
    }

    /**
     * <h1>取模板</h1>
     *
     * <p>
     * 参数名 类型 是否必须 描述 示例
     * </p>
     * <p>
     * apikey String 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     * <p>
     * tpl_id Long 否 模板id，64位长整形。指定id时返回id对应的 模板。未指定时返回所有模板 1
     * </p>
     *
     * @param array $param
     *            tpl_id
     * @return Result
     */
    function get(array $param) {
        static $must = [self::APIKEY];
        $r = $this->verifyParam($param, $must);
        if (!$r->isSucc()) return $r;
        
        $v = $this->version();
        $h = new CommonResultHandler(function ($rsp) use ($v) {
            switch ($v) {
                case self::VERSION_V1:
                    return $rsp[self::TEMPLATE];
                case self::VERSION_V2:
                    return $rsp;
            }
            return null;
        });
        return $this->path("get.json")->post($param, $h, $r);
    }

    /**
     * <h1>添加模板</h1>
     *
     * <p>
     * 参数名 类型 是否必须 描述 示例
     * </p>
     * <p>
     * apikey String 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     * <p>
     * tpl_content String 是 模板内容，必须以带符号【】的签名开头 【云片网】您的验证码是#code#
     * </p>
     * <p>
     * notify_type Integer 否 审核结果短信通知的方式: 0表示需要通知,默认; 1表示仅审核不通过时通知; 2表示仅审核通过时通知;
     * 3表示不需要通知 1
     * </p>
     * <p>
     * lang String 否 国际短信模板所需参数，模板语言:简体中文zh_cn; 英文en; 繁体中文 zh_tw; 韩文ko,日文 ja
     * zh_cn
     * </p>
     *
     * @param array $param            
     * @return Result
     */
    function add(array $param) {
        static $must = [self::APIKEY,self::TPL_CONTENT];
        $r = $this->verifyParam($param, $must);
        if (!$r->isSucc()) return $r;
        
        $v = $this->version();
        $h = new CommonResultHandler(function ($rsp) use ($v) {
            switch ($v) {
                case self::VERSION_V1:
                    return $rsp[self::TEMPLATE];
                case self::VERSION_V2:
                    return $rsp;
            }
            return null;
        });
        return $this->path("add.json")->post($param, $h, $r);
    }

    /**
     * <h1>删除模板</h1>
     *
     * <p>
     * 参数名 类型 是否必须 描述 示例
     * </p>
     * <p>
     * apikey String 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     * <p>
     * tpl_id Long 是 模板id，64位长整形 9527
     * </p>
     *
     * @param array $param            
     * @return Result
     */
    function del(array $param) {
        static $must = [self::APIKEY,self::TPL_ID];
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
        return $this->path("del.json")->post($param, $h, $r);
    }

    /**
     * <h1>修改模板</h1>
     *
     * <p>
     * 参数名 类型 是否必须 描述 示例
     * </p>
     * <p>
     * apikey String 是 用户唯一标识 9b11127a9701975c734b8aee81ee3526
     * </p>
     * <p>
     * tpl_id Long 是 模板id，64位长整形，指定id时返回id对应的模板。未指定时返回所有模板 9527
     * </p>
     * <p>
     * tpl_content String 是
     * 模板id，64位长整形。指定id时返回id对应的模板。未指定时返回所有模板模板内容，必须以带符号【】的签名开头 【云片网】您的验证码是#code#
     * </p>
     * <p>
     * notify_type Integer 否 审核结果短信通知的方式: 0表示需要通知,默认; 1表示仅审核不通过时通知; 2表示仅审核通过时通知;
     * 3表示不需要通知 1
     * </p>
     * <p>
     * lang String 否 国际短信模板所需参数，模板语言:简体 中文zh_cn; 英文en; 繁体中文 zh_tw; 韩文ko,日文 ja
     * zh_cn
     * </p>
     *
     * @param array $param            
     * @return Result
     *
     */
    function update(array $param) {
        static $must = [self::APIKEY,self::TPL_ID,self::TPL_CONTENT];
        $r = $this->verifyParam($param, $must);
        if (!$r->isSucc()) return $r;
        $v = $this->version();
        
        $h = new CommonResultHandler(function ($rsp) use ($v) {
            switch ($v) {
                case self::VERSION_V1:
                    return $rsp[self::TEMPLATE];
                case self::VERSION_V2:
                    return array_key_exists(self::TEMPLATE, $rsp) ? $rsp[self::TEMPLATE] : $rsp;
            }
            return null;
        });
        return $this->path("update.json")->post($param, $h, $r);
    }

}