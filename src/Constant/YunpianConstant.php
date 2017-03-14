<?php

namespace Yunpian\Sdk\Constant;

interface YunpianConstant {
    
    /**
     * ************************** http ************************************
     */
    const HTTP_CONN_TIMEOUT = 'http.conn.timeout';
    const HTTP_SO_TIMEOUT = 'http.so.timeout';
    const HTTP_CHARSET = 'http.charset';
    const HTTP_CONN_MAXPREROUTE = 'http.conn.maxpreroute';
    const HTTP_CONN_MAXTOTAL = 'http.conn.maxtotal';
    const HTTP_SSL_KEYSTORE = 'http.ssl.keystore';
    const HTTP_SSL_PASSWD = 'http.ssl.passwd';
    
    const HTTP_CHARSET_DEFAULT = 'utf-8';
    
    /**
     * ************************** yunapian.properties ************************************
     */
    const YP_FILE = 'yp.file';
    const YP_APIKEY = 'yp.apikey';
    const YP_VERSION = 'yp.version';
    const YP_USER_HOST = 'yp.user.host';
    const YP_SIGN_HOST = 'yp.sign.host';
    const YP_TPL_HOST = 'yp.tpl.host';
    const YP_SMS_HOST = 'yp.sms.host';
    const YP_VOICE_HOST = 'yp.voice.host';
    const YP_FLOW_HOST = 'yp.flow.host';
    const YP_CALL_HOST = 'yp.call.host';
    
    /**
     * ************************** api ************************************
     */
    const VERSION_V1 = 'v1';
    const VERSION_V2 = 'v2';
    
    const APIKEY = 'apikey';
    
    // 返回值字段
    const CODE = 'code';
    const MSG = 'msg';
    const DETAIL = 'detail';
    const DATA = 'data';
    
    // user
    const USER = 'user';
    const BALANCE = 'balance';
    /**
     * 紧急联系人电话
     */
    const EMERGENCY_MOBILE = 'emergency_mobile';
    const EMERGENCY_CONTACT = 'emergency_contact';
    
    /**
     * 余额告警阈值
     */
    const ALARM_BALANCE = 'alarm_balance';
    const IP_WHITELIST = 'ip_whitelist';
    const EMAIL = 'email';
    const MOBILE = 'mobile';
    const GMT_CREATED = 'gmt_created';
    const API_VERSION = 'api_version';
    
    // sign
    const SIGN = 'sign';
    const NOTIFY = 'notify';
    const APPLYVIP = 'apply_vip';
    const ISONLYGLOBAL = 'is_only_global';
    const INDUSTRYTYPE = 'industry_type';
    const OLD_SIGN = 'old_sign';
    
    // tpl
    /**
     * 模板id
     */
    const TPL_ID = 'tpl_id';
    /**
     * 模板值
     */
    const TPL_VALUE = 'tpl_value';
    /**
     * 模板内容
     */
    const TPL_CONTENT = 'tpl_content';
    const CHECK_STATUS = 'check_status';
    const REASON = 'reason';
    const TEMPLATE = 'template';
    /**
     * 模板语言
     */
    const LANG = 'lang';
    const COUNTRY_CODE = 'country_code';
    const NOTIFY_TYPE = 'notify_type';
    
    // call
    const FROM = 'from';
    const TO = 'to';
    const DURATION = 'duration';
    const AREA_CODE = 'area_code';
    const MESSAGE_ID = 'message_id';
    const ANONYMOUS_NUMBER = 'anonymous_number';
    const PAGE_SIZE = 'page_size';
    
    // flow
    const CARRIER = 'carrier';
    const FLOW_PACKAGE = 'flow_package';
    const _SIGN = '_sign';
    const CALLBACK_URL = 'callback_url';
    const RESULT = 'result';
    const FLOW_STATUS = 'flow_status';
    
    // voice
    const DISPLAY_NUM = 'display_num';
    const VOICE_STATUS = 'voice_status';
    
    // sms
    const EXTEND = 'extend';
    const SMS_STATUS = 'sms_status';
    const SMS_REPLY = 'sms_reply';
    const SMS = 'sms';
    const TOTAL = 'total';
    
    const NICK = 'nick';
    const UID = 'uid';
    
    const TEXT = 'text';
    const START_TIME = 'start_time';
    const END_TIME = 'end_time';
    const PAGE_NUM = 'page_num';
    
    /**
     * 流量充值参数
     */
    const SN = 'sn';
    
    const COUNT = 'count';
    const FEE = 'fee';
    const UNIT = 'unit';
    
    const SID = 'sid';
    
    /**
     * batch_send 接口 增添的返回值名
     */
    const TOTAL_COUNT = 'total_count';
    const TOTAL_FEE = 'total_fee';
    
    const SEPERATOR_COMMA = ',';
    
    const RECORD_ID = 'record_id';

}


