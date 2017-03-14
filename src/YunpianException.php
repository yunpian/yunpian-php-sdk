<?php

namespace Yunpian\Sdk;

/**
 *
 * @deprecated
 *
 * @author dzh
 * @since 1.0
 */
class YunpianException extends \Exception {

    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}