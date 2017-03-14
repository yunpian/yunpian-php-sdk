<?php

namespace Yunpian\Tests\Sdk\Api;

use PHPUnit\Framework\TestCase;
use Yunpian\Sdk\Constant\YunpianConstant;

/**
 *
 * @author dzh
 * @since 1.0
 */
class FlowApiTest extends TestCase {
    use YunpianApiInit;

    function _test_get_package() {
        $clnt = $this->clnt;
        
        var_dump($clnt->flow()->get_package());
        
        // v1
        // var_dump($clnt->flow()->version(YunpianConstant::VERSION_V1)->get_package());
    }

    function _test_recharge() {
        $clnt = $this->clnt;
        
        $param = [YunpianConstant::MOBILE => '18616020000',YunpianConstant::SN => '1008601'];
        var_dump($clnt->flow()->recharge($param));
        
        // v1
        // var_dump($clnt->flow()->version(YunpianConstant::VERSION_V1)->recharge($param));
    }

    function _test_pull_status() {
        $clnt = $this->clnt;
        
        $param = [YunpianConstant::MOBILE => '18616020000'];
        // YunpianConstant::SN=>'1008601'
        
        var_dump($clnt->flow()->pull_status($param));
        
        // v1
        // var_dump($clnt->flow()->version(YunpianConstant::VERSION_V1)->pull_status($param));
    }

}
