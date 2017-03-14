<?php

namespace Yunpian\Tests\Sdk\Api;

use PHPUnit\Framework\TestCase;
use Yunpian\Sdk\Constant\YunpianConstant as YC;
use Yunpian\Sdk\Util\ApiUtil;

/**
 *
 * @author dzh
 * @since 1.0
 */
class SmsApiTest extends TestCase {
    use YunpianApiInit;

    function _test_single_send() {
        $clnt = $this->clnt;
        
        $param = [YC::MOBILE => '18616020000',YC::TEXT => '【云片网】您的验证码是1234'];
        var_dump($clnt->sms()->single_send($param));
    }

    function _test_batch_send() {
        $clnt = $this->clnt;
        
        $param = [YC::MOBILE => '18616020000',YC::TEXT => '【云片网】您的验证码是1234'];
        var_dump($clnt->sms()->batch_send($param));
    }

    function _test_multi_send() {
        $clnt = $this->clnt;
        $param = [YC::MOBILE => '18616020610,18616020611',
            YC::TEXT => ApiUtil::urlEncodeAndLink(['【哈哈哈】您的验证码,是1234','【哈哈哈】您的验证码是1234'])];
        var_dump($clnt->sms()->multi_send($param));
    }

    /**
     *
     * @deprecated
     *
     */
    function _test_tpl_single_send() {
        $clnt = $this->clnt;
        
        $param = [YC::MOBILE => '18616020000',YC::TPL_ID => '1',YC::TPL_VALUE => '#company#=云片网'];
        var_dump($clnt->sms()->tpl_single_send($param));
    }

    /**
     *
     * @deprecated
     *
     */
    function _test_tpl_batch_send() {
        $clnt = $this->clnt;
        
        $param = [YC::MOBILE => '18616020000',YC::TPL_ID => '1',YC::TPL_VALUE => '#company#=云片网'];
        var_dump($clnt->sms()->tpl_batch_send($param));
    }

    function _test_pull_status() {
        $clnt = $this->clnt;
        
        $param = [YC::PAGE_SIZE => '20'];
        var_dump($clnt->sms()->pull_status($param));
        
        // v1
        var_dump($clnt->sms()->version(YC::VERSION_V1)->pull_status($param));
    }

    function _test_pull_reply() {
        
        $clnt = $this->clnt;
        
        $param = [YC::PAGE_SIZE => '20'];
        var_dump($clnt->sms()->pull_reply($param));
        
        // v1
        // var_dump($clnt->sms()->version(YC::VERSION_V1)->pull_reply($param));
    }

    function _test_get_record() {
        $clnt = $this->clnt;
        
        $param = [YC::START_TIME => '2013-08-11 00:00:00',YC::END_TIME => '2016-12-05 00:00:00',YC::PAGE_NUM => '1',
            YC::PAGE_SIZE => '20'];
        var_dump($clnt->sms()->get_record($param));
        
        // v1
        // var_dump($clnt->sms()->version(YC::VERSION_V1)->get_record($param));
    }

    function _test_get_black_word() {
        $clnt = $this->clnt;
        
        $param = [YC::TEXT => '高利贷,发票'];
        var_dump($clnt->sms()->get_black_word($param));
        
        // v1
        // var_dump($clnt->sms()->version(YC::VERSION_V1)->get_black_word($param));
    }

    /**
     *
     * @deprecated
     *
     */
    function _test_send() {
        $clnt = $this->clnt;
        
        $param = [YC::MOBILE => '18616020000',YC::TEXT => '【云片网】您的验证码是1234'];
        var_dump($clnt->sms()->version(YC::VERSION_V1)->send($param));
    }

    function _test_get_reply() {
        $clnt = $this->clnt;
        
        $param = [YC::START_TIME => '2013-08-11 00:00:00',YC::END_TIME => '2016-12-05 00:00:00',YC::PAGE_NUM => '1',
            YC::PAGE_SIZE => '20'];
        var_dump($clnt->sms()->get_reply($param));
        
        // v1
        // var_dump($clnt->sms()->version(YC::VERSION_V1)->get_reply($param));
    }

    /**
     *
     * @deprecated
     *
     */
    function _test_tpl_send() {
        $clnt = $this->clnt;
        
        $param = [YC::MOBILE => '18616020000',YC::TPL_ID => '1',YC::TPL_VALUE => '#company#=云片网'];
        var_dump($clnt->sms()->version(YC::VERSION_V1)->tpl_send($param));
    }

    function _test_count() {
        $clnt = $this->clnt;
        
        $param = [YC::START_TIME => '2013-08-11 00:00:00',YC::END_TIME => '2016-12-05 00:00:00',YC::PAGE_NUM => '1',
            YC::PAGE_SIZE => '20'];
        // v1
        var_dump($clnt->sms()->version(YC::VERSION_V1)->count($param));
        
        // don't invoke count with v2,result is invalid json
        // var_dump($clnt->sms()->count($param));
    }

}
