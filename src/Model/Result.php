<?php

namespace Yunpian\Sdk\Model;

use Yunpian\Sdk\Constant\Code;

/**
 * Result of HttpClient Response
 *
 * @author dzh
 * @since 1.0
 */
class Result {
    
    /**
     *
     * @var int
     */
    private $code = Code::OK;
    
    /**
     *
     * @var string
     */
    private $msg;
    
    /**
     *
     * @var string
     */
    private $detail;
    
    /**
     *
     * @var \Exception
     */
    private $e;
    
    /**
     * json
     *
     * @var mixed
     */
    private $data;

    function __toString() {
        return "{$this->code}-{$this->msg}-{$this->detail}";
    }

    function isSucc() {
        return $this->code == Code::OK;
    }

    /**
     *
     * @param number $code            
     * @param boolean $rr            
     * @return number|\Yunpian\Sdk\Model\Result
     */
    function code($code = null, $rr = false) {
        if (isset($code) || $rr) {
            $this->code = $code;
            return $this;
        }
        return $this->code;
    }

    /**
     *
     * @param string $msg            
     * @param boolean $rr
     *            force to return $this
     * @return string|\Yunpian\Sdk\Model\Result
     */
    function msg($msg = null, $rr = false) {
        if (isset($msg) || $rr) {
            $this->msg = $msg;
            return $this;
        }
        return $this->msg;
    }

    /**
     *
     * @param string $detail            
     * @param boolean $rr
     *            force to return $this
     * @return string|\Yunpian\Sdk\Model\Result
     */
    function detail($detail = null, $rr = false) {
        if (isset($detail) || $rr) {
            $this->detail = $detail;
            return $this;
        }
        return $this->detail;
    }

    /**
     *
     * @param string $e            
     * @param boolean $rr            
     * @return Exception|\Yunpian\Sdk\Model\Result
     */
    function exception($e = null, $rr = false) {
        if (isset($e) || $rr) {
            $this->e = $e;
            return $this;
        }
        return $this->e;
    }

    /**
     *
     * @param array $data            
     * @param boolean $rr            
     * @return array|\Yunpian\Sdk\Model\Result
     */
    function data($data = null, $rr = false) {
        if (isset($data) || $rr) {
            $this->data = $data;
            return $this;
        }
        return $this->data;
    }

}