<?php

namespace Yunpian\Tests\Sdk\Api;

use PHPUnit\Framework\TestCase;
use Yunpian\Sdk\Constant\YunpianConstant as YC;

/**
 *
 * @author dzh
 * @since 1.0
 */
class SignApiTest extends TestCase {
    use YunpianApiInit;

    function _test_add() {
        $clnt = $this->clnt;
        
        $param = [YC::SIGN => '你好吗',YC::NOTIFY => 'true',YC::APPLYVIP => 'false',YC::ISONLYGLOBAL => 'false',
            YC::INDUSTRYTYPE => '其他'];
        var_dump($clnt->sign()->add($param));
    }

    function _test_update() {
        $clnt = $this->clnt;
        
        $param = [YC::OLD_SIGN => '你好吗',YC::SIGN => '我很好',YC::NOTIFY => 'true',YC::APPLYVIP => 'false',
            YC::ISONLYGLOBAL => 'false',YC::INDUSTRYTYPE => '其他'];
        var_dump($clnt->sign()->update($param));
    }

    function _test_get() {
        $clnt = $this->clnt;
        
        $param = [YC::SIGN => '',YC::PAGE_NUM => '1',YC::PAGE_SIZE => "3"];
        var_dump($clnt->sign()->get($param));
    }

}
