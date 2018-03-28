<?php
require dirname(__DIR__) . '/vendor/autoload.php';
use \Yunpian\Sdk\YunpianClient;

//初始化client,apikey作为所有请求的默认值
$clnt = YunpianClient::create($apikey);
$param = [YunpianClient::MOBILE => '18616020000' ,YunpianClient::TEXT => '【云片网】您的验证码是1234'];
//SDK 有必选参数，其他参数可以参考文档选择使用:https://www.yunpian.com/doc/zh_CN/domestic/single_send.html  
$r = $clnt->sms()->single_send($param);
// SDK 具体方法可以参考:https://github.com/yunpian/yunpian-php-sdk/tree/master/src/Api
//var_dump($r);
if($r->isSucc()){
    var_dump( $r->data());
}
//账户$clnt->user() 签名$clnt->sign() 模版$clnt->tpl() 短信$clnt->sms() 语音$clnt->voice() 流量$clnt->flow() 视频短信$clnt->vsms() 
