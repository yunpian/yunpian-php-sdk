<?php

namespace Yunpian\Tests\Sdk\Api;

use PHPUnit\Framework\TestCase;

class UserApiTest extends TestCase {
    use YunpianApiInit;

    function testGet() {
        $clnt = $this->clnt;
        print_r($clnt->user()->get());
    }

}