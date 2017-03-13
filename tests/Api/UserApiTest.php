<?php

namespace Yunpian\Tests\Sdk\Api;

use PHPUnit\Framework\TestCase;

class UserApiTest extends TestCase {
    use YunpianApiInit;

    function _test_get() {
        $clnt = $this->clnt;
        var_dump($clnt->user()->get());
        
        // v1
        // var_dump($clnt->user()->version(YunpianConstant::VERSION_V1)->get());
    }

    function _test_set() {
        $clnt = $this->clnt;
        $param = ['emergency_mobile' => '18616020000'];
        
        var_dump($clnt->user()->set($param));
    }

    function _testCallback() {

        function cb(callable $p) {
            $p();
        }
        
        $arr = ['1' => '2'];
        cb(function () use ($arr) {
            var_dump($arr);
        });
        
        $x = new X(function (&$rsp) use ($arr) {
            var_dump($rsp);
        });
        $x->call();
    }

}

class X {
    private $f;

    function __construct(callable $p) {
        $this->f = $p;
    }

    function call() {
        $arr1 = ['2' => '3'];
        call_user_func_array($this->f, $arr1);
    }

}