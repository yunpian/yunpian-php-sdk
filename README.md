
# SDK使用指南

---
## php
### 添加依赖包
1. 下载依赖包

```
在config.php 文件内填写你的 APIKEY、APISECRET
在使用处添加以下引用
require_once('path/to/YunpianAutoload.php');
```

### 使用


```
<?php
/**
 * Created by PhpStorm.
 * User: bingone
 * Date: 16/1/19
 * Time: 下午4:10
 */


require_once '../YunpianAutoload.php';


/**
 * 更多内容请参考 <url>https://www.yunpian.com/api2.0/howto.html</url>
 */

/**
 *
 * 如您第一次使用云片网，强烈推荐先看云片网络设置教程 <url>https://blog.yunpian.com/?p=94</url>
 *
 * 使用说明
 *
 * 1、登陆 <url>http://www.yunpian.com/</url> 获取APIKEY
 * 2、在conf/config.php 中设置自己的APIKEY 并引入YunpianAutoload.php
 * 3、获取需要的操作类SmsOperator/UserOperator/TplOperator/FlowOperator/VoiceOperator
 * 4、接收返回值类型为Result，通过isSuccess()判断是否成功。具体可参考示例。
 *
 * 返回值参考
 * <url>https://www.yunpian.com/api2.0/sms.html</url>
 * <url>https://www.yunpian.com/api2.0/record.html</url>
 */

// 发送单条短信
$smsOperator = new SmsOperator();
$data['mobile'] = '13300000000';
$data['text'] = '【云片网】您的验证码是1234';
$result = $smsOperator->single_send($data);
print_r($result);
//发送批量短信，批量发送的接口耗时比单号码发送长，如果需要更高并发速度，推荐使用single_send/tpl_single_send
//$data['mobile'] = '13100000000,13100000001,2,13100000003';
//$result = $smsOperator->batch_send($data);
//print_r($result);
//（这个是个性化接口发送，批量发送的接口耗时比单号码发送长，如果需要更高并发速度，推荐使用single_send/tpl_single_send，不推荐使用）
//$data['mobile'] = '13000000000,13000000001,1,13000000003';
//$data['text'] = '【云片网】您的验证码是1234,【云片网】您的验证码是6414,【云片网】您的验证码是0099,【云片网】您的验证码是3451';
//$result = $smsOperator->multi_send($data);
//print_r($result);

//（这个是模板接口发送，会因为一些特殊字符产生编码问题导致发送失败，不推荐使用）
// 模板为【#company#】您的验证码是#code#
// 发送内容：【云片网】您的验证码是1234
//$data['mobile'] = '13400000000,13400000001,1,13400000003';
//$data['tpl_id'] = "1";
//$data['tpl_value'] =
//    urlencode("#code#") . "="
//    . urlencode("1234") . "&"
//    . urlencode("#company#") . "="
//    . urlencode("云片网");
//$result = $smsOperator->tpl_batch_send($data);
//print_r($result);


// 流量
//$flowOperator = new FlowOperator();
//$result = $flowOperator->get_package();
//print_r($result);
//$result = $flowOperator->recharge(array("sn"=>"1008601","mobile"=>"18700000000"));
//print_r($result);

// 语音
//$voiceOperator = new VoiceOperator();
//$result = $voiceOperator->send(array("mobile"=>"18700000000","code"=>"1234"));
//print_r($result);
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
$result = $tplOperator->add(array("tpl_content"=>"【云片网】尊敬的用户，您的验证码#code#"));
print_r($result);
?>
```



