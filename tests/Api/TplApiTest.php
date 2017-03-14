<?php

namespace Yunpian\Tests\Sdk\Api;

use PHPUnit\Framework\TestCase;
use Yunpian\Sdk\Constant\YunpianConstant;

/**
 *
 * @author dzh
 * @since 1.0
 */
class TplApiTest extends TestCase {
    use YunpianApiInit;

    function _test_add() {
        $clnt = $this->clnt;
        
        $param = [YunpianConstant::TPL_CONTENT => '【云片网】您的验证码是#code#'];
        var_dump($clnt->tpl()->add($param));
        
        // v1
        // var_dump($clnt->tpl()->version(YunpianConstant::VERSION_V1)->add($param));
    }

    function _test_get() {
        $clnt = $this->clnt;
        
        $param = [YunpianConstant::TPL_ID => '1'];
        var_dump($clnt->tpl()->get($param));
        
        // v1
        // var_dump($clnt->tpl()->version(YunpianConstant::VERSION_V1)->get($param));
    }

    function _test_del() {
        $clnt = $this->clnt;
        
        $param = [YunpianConstant::TPL_ID => '1'];
        var_dump($clnt->tpl()->del($param));
        
        // v1
        // var_dump($clnt->tpl()->version(YunpianConstant::VERSION_V1)->del($param));
    }

    function _test_get_default() {
        $clnt = $this->clnt;
        
        $param = [YunpianConstant::TPL_ID => '1'];
        var_dump($clnt->tpl()->get_default($param));
        
        // v1
        // var_dump($clnt->tpl()->version(YunpianConstant::VERSION_V1)->get_default($param));
    }

    function _test_update() {
        $clnt = $this->clnt;
        
        $param = [YunpianConstant::TPL_ID => '1',YunpianConstant::TPL_CONTENT => '【云片网】您的验证码是#code#'];
        var_dump($clnt->tpl()->update($param));
        
        // v1
        // var_dump($clnt->tpl()->version(YunpianConstant::VERSION_V1)->update($param));
    }

}
