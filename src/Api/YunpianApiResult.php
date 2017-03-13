<?php

namespace Yunpian\Sdk\Api;

use Yunpian\Sdk\Constant\Code;
use Yunpian\Sdk\Constant\YunpianConstant;
use Yunpian\Sdk\Model\Result;

interface YunpianApiResult {

    /**
     *
     * @param array $rsp            
     * @param ResultHandler $h            
     * @param Result $r            
     * @return Result
     */
    function result(array $rsp, ResultHandler $h, Result $r);

    /**
     * acquire response code
     *
     * @param array $rsp            
     * @param string $version            
     * @return number
     */
    function code(array &$rsp, $version);

}

interface ResultHandler {

    /**
     * Invoked if code is 0
     *
     * @param int $code            
     * @param array $rsp            
     * @param Result $r            
     * @return Result
     */
    function succ($code, array $rsp, $r);

    /**
     * Invoked if code is not 0
     *
     * @param
     *            int code
     * @param
     *            array rsp
     * @param Result $r            
     * @return r
     */
    function fail($code, array $rsp, $r);

    /**
     *
     * @param \Exception $e            
     * @param Result $r            
     */
    function catchExceptoin($e, $r);

}

class CommonResultHandler implements ResultHandler {
    
    private $data;

    function __construct(callable $data) {
        $this->data = $data;
    }

    function succ($code, array $rsp, $r) {
        if (is_null($r)) {
            $r = new Result();
        }
        return $r->code($code)->msg(array_key_exists(YunpianConstant::MSG, $rsp) ? $rsp[YunpianConstant::MSG] : null, 
                true)->data(call_user_func($this->data, $rsp));
    }

    function fail($code, array $rsp, $r) {
        if (is_null($r)) {
            $r = new Result();
        }
        return $r->code($code)->msg(array_key_exists(YunpianConstant::MSG, $rsp) ? $rsp[YunpianConstant::MSG] : null, 
                true)->detail(array_key_exists(YunpianConstant::DETAIL, $rsp) ? $rsp[YunpianConstant::DETAIL] : null, 
                true);
    }

    function catchExceptoin($e, $r) {
        if (is_null($r)) {
            $r = new Result();
        }
        return $r->code(Code::UNKNOWN_EXCEPTION)->exception($e, true);
    }

}