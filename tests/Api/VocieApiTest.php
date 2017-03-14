<?php

namespace Yunpian\Tests\Sdk\Api;

use PHPUnit\Framework\TestCase;
use Yunpian\Sdk\Constant\YunpianConstant;

class VoiceApiTest extends TestCase {
    use YunpianApiInit;

    function _test_send() {
        $clnt = $this->clnt;
        $param = [YunpianConstant::MOBILE => '18616020000',YunpianConstant::CODE => '1234'];
        var_dump($clnt->voice()->send($param));
        
        // v1
        // var_dump($clnt->voice()->version(YunpianConstant::VERSION_V1)->send($param));
    }

    function test_pull_status() {
        $clnt = $this->clnt;
        $param = [YunpianConstant::PAGE_SIZE => '20'];
        var_dump($clnt->voice()->pull_status($param));
        
        // v1
        // var_dump($clnt->voice()->version(YunpianConstant::VERSION_V1)->pull_status($param));
    }

}
