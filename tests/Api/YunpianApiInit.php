<?php

namespace Yunpian\Tests\Sdk\Api;

use Yunpian\Sdk\YunpianClient;
use Yunpian\Tests\Sdk\YunpianConfTest;

trait YunpianApiInit {
    
    protected $clnt;

    function setUp() {
        $apikey = 'bc3c4f272d8e39c53695f9d3feb7e9c6';
        $this->clnt = YunpianClient::create($apikey, YunpianConfTest::CONF_TEST);
        // print $this->clnt;
    }

    function tearDown() {
        unset($clnt);
    }

}
