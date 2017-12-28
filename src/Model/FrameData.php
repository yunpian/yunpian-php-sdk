<?php

namespace Yunpian\Sdk\Model;

/**
 *
 * @author dzh
 * @since 1.0.2
 */
class FrameData {
    public $index = 1;
    public $fileName;

    function index($index = null, $rr = false) {
        if (isset($index) || $rr) {
            $this->index = $index;
            return $this;
        }
        return $this->index;
    }

    function fileName($fileName = null, $rr = false) {
        if (isset($fileName) || $rr) {
            $this->fileName = $fileName;
            return $this;
        }
        return $this->fileName;
    }
}