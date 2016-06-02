<?php
/**
 * Created by PhpStorm.
 * User: bingone
 * Date: 16/1/19
 * Time: 下午4:10
 */

// 1. 首先在 conf/config.php   中配置自己的apikey

// 返回格式可参考官网:   www.yunpian.com
// 2. require the file
require_once '../YunpianAutoload.php';



// 发送单条短信
$smsOperator = new SmsOperator();
$data['mobile'] = '13300000000';
$data['text'] = '【云片网】您的验证码是1234';
$result = $smsOperator->single_send($data);
print_r($result);
//发送批量短信
$data['mobile'] = '13100000000,13100000001,2,13100000003';
$result = $smsOperator->batch_send($data);
print_r($result);
//发送个性化短信
$data['mobile'] = '13000000000,13000000001,1,13000000003';
$data['text'] = '【云片网】您的验证码是1234,【云片网】您的验证码是6414,【云片网】您的验证码是0099,【云片网】您的验证码是3451';
$result = $smsOperator->multi_send($data);
print_r($result);

//发送指定模板短信(不推荐)
// 模板为【#company#】您的验证码是#code#
// 发送内容：【云片网】您的验证码是1234
//$data['mobile'] = '13400000000,13400000001,1,13400000003';
//$data['tpl_id'] = "1";
//$data['tpl_value'] =
//    urlencode("#code#") . "="
//    . urlencode("1234") . "&"
//    . urlencode("#company#") . "="
//    . urlencode("云片网");
//$result = $smsOperator->tpl_send($data);
//print_r($result);


// 流量
$flowOperator = new FlowOperator();
$result = $flowOperator->get_package();
print_r($result);
$result = $flowOperator->recharge(array("sn"=>"1008601","mobile"=>"18700000000"));
print_r($result);

// 语音
$voiceOperator = new VoiceOperator();
$result = $voiceOperator->send(array("mobile"=>"18700000000","code"=>"1234"));
print_r($result);
// 获取用户信息
$userOperator = new UserOperator();
$result = $userOperator->get();
print_r($result);

// 模板
$tplOperator = new TplOperator();
$result = $tplOperator->get_default(array("tpl_id"=>'2'));
print_r($result);
$result = $tplOperator->get();
print_r($result);
$result = $tplOperator->add(array("tpl_content"=>"【bb】大倪#asdf#"));
print_r($result);
?>