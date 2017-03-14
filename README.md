yunpian-php-sdk
================================
[云片](https://www.yunpian.com/) SDK

## 快速开始

- 添加composer依赖

```json
"require" : {
        "yunpian/yunpian-php-sdk" : "~1.0"
    }
```
**注**: master是最新稳定版。我们会更新到[Packagist](https://packagist.org/explore/)

- 使用YunpianClient

```php
use \Yunpian\Sdk\YunpianClient;

//初始化client,apikey作为所有请求的默认值
$clnt = YunpianClient::create($apikey);

$param = [YunpianClient::MOBILE => '18616020000',YunpianClient::TEXT => '【云片网】您的验证码是1234'];
$r = $clnt->sms()->single_send($param);
var_dump($r);

//账户 $clnt->user() 签名 $clnt->sign() 模版 $clnt->tpl() 短信 $clnt->sms() 语音 $clnt->voice() 流量 $clnt->flow()
```
**注**: v1.0开始使用composer管理工程。不兼容之前版本，若需要可从github下载[0.0.1](https://github.com/yunpian/yunpian-php-sdk/releases/tag/0.0.1)

## 配置说明 (默认配置就行)
- 默认配置文件 src/yunpian.ini
- 构造器配置
    - `YunpianClient::create($apikey);`
    - `YunpianClient::create($apikey,$conf);` 
- apikey的优先级 函数的$param[YunpianConstant::APIKEY] > 构造器的$apikey > 构造器的$conf[YunpianConstant::YP_APIKEY] > yunpian.ini

## 源码说明 yunpian-php-sdk
- 工程使用composer构造，php5.6 or higher
- 开发API可参考单元测试 tests/Api
- 执行单元测试 `phpunit tests`，安装[phpunit](https://phpunit.de/manual/5.7/en/installation.html)

## 联系我们
[云片支持 QQ](https://static.meiqia.com/dist/standalone.html?eid=30951&groupid=0d20ab23ab4702939552b3f81978012f&metadata={"name":"github"})

SDK开源QQ群

<img src="doc/sdk_qq.jpeg" width="15%" alt="SDK开源QQ群"/>

## 文档链接
- [api文档](https://www.yunpian.com/api2.0/guide.html)

