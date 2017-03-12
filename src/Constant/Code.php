<?php

namespace Yunpian\Sdk\Constant;

class Code {
    
    /**
     *
     * @var int success
     */
    const OK = 0;
    
    /**
     * **************** 调用API时间发生的错误，需要开发者自己处理 ***************************
     */
    /**
     * 请求参数缺失
     */
    const ARGUMENT_MISSING = 1;
    /**
     * 请求参数格式错误
     */
    const BAD_ARGUMENT_FORMAT = 2;
    /**
     * 账户余额不足
     */
    const MONEY_NOT_ENOUGH = 3;
    
    /**
     * 关键词过滤
     */
    const BLACK_WORD = 4;
    
    /**
     * 未找到对应id的模板
     */
    const TPL_NOT_FOUND = 5;
    /**
     * 添加模板失败
     */
    const ADD_TPL_FAILED = 6;
    /**
     * 模板不可用
     */
    const TPL_NOT_VALID = 7;
    /**
     * 同一手机号30秒内重复提交相同的内容
     */
    const DUP_IN_SHORT_TIME = 8;
    /**
     * 同一手机号5分钟内重复提交相同内容超过3次
     */
    const TOO_MANY_TIME_IN_5 = 9;
    /**
     * 手机号黑名单过滤
     */
    const BLACK_PHONE_FILTER = 10;
    /**
     * 接口不支持GET方式调用
     */
    const GET_METHOD_NOT_SUPPORT = 11;
    /**
     * 接口不支持POST方式调用
     */
    const POST_METHOD_NOT_SUPPORT = 12;
    /**
     * 营销短信暂停发送
     */
    const MARKET_FORBIDDEN = 13;
    /**
     * 解码失败
     */
    const DECODE_ERROR = 14;
    /**
     * 签名不匹配
     */
    const SIGN_NOT_MATCH = 15;
    /**
     * 签名格式不正确
     */
    const BAD_SIGN_FORMAT = 16;
    /**
     * 24小时内同一手机号发送次数超过限制
     */
    const DAY_LIMIT_PER_MOBILE = 17;
    /**
     * 签名校验失败
     */
    const SIGN_NOT_VALID = 18;
    /**
     * 请求已失效
     */
    const REQUEST_NOT_VALID = 19;
    /**
     * 解密失败
     */
    const DECRYPT_ERROR = 21;
    
    /**
     * 不支持的国家地区
     */
    const REGION_NOT_SUPPORT = 20;
    
    /**
     * 1小时内同一手机号发送次数超过限制
     */
    const HOUR_LIMIT_PER_MOBILE = 22;
    
    /**
     * 发往模板支持的国家列表之外的地区
     */
    const REGION_NOT_IN_TPL_LIST = 23;
    
    /**
     * 添加告警设置失败
     */
    const ADD_ALARM_SETTING_FAILED = 24;
    /**
     * 手机号和内容个数不匹配
     */
    const LENGTH_NOT_MATCH = 25;
    
    /**
     * 不支持的流量包
     */
    const PACKAGE_ERROR = 26;
    
    /**
     * 未开通金额计费
     */
    const NO_MONEY_FEE_TYPE_FAILED = 27;
    
    /**
     * 不支持的运营商
     */
    const CARRIER_FAILED = 28;
    
    /**
     * ************* 权限相关的错误 需要开发者自己处理 ******************
     */
    /**
     * 非法的apikey
     */
    const BAD_API_KEY = -1;
    /**
     * API没有权限
     */
    const API_NOT_ALLOWED = -2;
    /**
     * IP没有权限
     */
    const IP_NOT_ALLOWED = -3;
    /**
     * 访问次数超限
     */
    const OVER_ACCESS_LIMIT = -4;
    /**
     * 访问频率超限
     */
    const OVER_ACCESS_RATE = -5;
    
    /**
     * 不支持批量发送
     */
    const NOT_SUPPORT_BATCH = -6;
    /**
     * ************** 系统内部错误 需要技术支持解决 ************************
     */
    /**
     * 未知异常
     */
    const UNKNOWN_EXCEPTION = -50;
    /**
     * 数据库操作失败
     */
    const DB_OPERATION_FAIL = -51;
    /**
     * 充值失败
     */
    const RECHARGE_FAILED = -52;
    /**
     * 提交短信失败
     */
    const SUBMIT_SMS_FAILED = -53;
    /**
     * 记录已经存在
     */
    const RECORD_ALREADY_EXISTED = -54;
    /**
     * 记录不存在
     */
    const RECORD_NOT_EXISTED = -55;
    /**
     * 赠送失败
     */
    const PROM_FAILED = -56;
    /**
     * 开通固定签名功能的用户，签名未设置
     */
    const SIGE_NOT_SET = -57;

}