<?php

namespace Yunpian\Tests\Sdk\Api;

use Yunpian\Sdk\YunpianClient;
use Yunpian\Tests\Sdk\YunpianConfTest;

trait YunpianApiInit{
    
    protected $clnt;

    function setUp() {
        $apikey = '';
        $this->clnt = YunpianClient::create($apikey, YunpianConfTest::CONF_TEST);
    }

    function tearDown() {
        unset($clnt);
    }

}
