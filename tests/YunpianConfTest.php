<?php

namespace Yunpian\Tests\Sdk;

use PHPUnit\Framework\TestCase;
use Yunpian\Sdk\YunpianConf;

final class YunpianConfTest extends TestCase {
    
    const CONF_TEST = ['yp.user.host' => 'https://test-api.yunpian.com',
        'yp.sign.host' => 'https://test-api.yunpian.com','yp.tpl.host' => 'https://test-api.yunpian.com',
        'yp.sms.host' => 'https://test-api.yunpian.com','yp.voice.host' => 'https://test-api.yunpian.com',
        'yp.flow.host' => 'https://test-api.yunpian.com','yp.call.host' => 'https://test-api.yunpian.com'];

    /**
     * @codeCoverageIgnore
     */
    function testInit() {
        // print_r(STDOUT, __CLASS__ . __METHOD__ . "\n");
        $conf = new YunpianConf();
        $conf->init();
        // print_r($conf);
        
        $conf->with('1', self::CONF_TEST);
        // print_r($conf);
        
        $this->assertEquals('1', $conf->conf(YunpianConf::YP_APIKEY));
    }

}