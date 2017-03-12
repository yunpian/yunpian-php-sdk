<?php

namespace Yunpian\Tests\Sdk;

use PHPUnit\Framework\TestCase;
use Yunpian\Sdk\YunpianClient;
use Yunpian\Tests\Sdk\YunpianConfTest;

final class YunpianClientTest extends TestCase {
    
    private static $yunpianClient;

    static function setUpBeforeClass() {
        // fwrite(STDOUT, __CLASS__ . __METHOD__ . "\n");
        self::$yunpianClient = YunpianClient::create("11", YunpianConfTest::CONF_TEST);
    }

    protected function setUp() {}

    protected function tearDown() {}

    static function tearDownAfterClass() {}

}