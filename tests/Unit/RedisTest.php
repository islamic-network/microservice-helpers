<?php


namespace IslamicNetwork\MicroServiceHelpers\tests\Unit;

use IslamicNetwork\MicroServiceHelpers\Monitors\Redis;
use PHPUnit\Framework\TestCase;

class RedisTest extends TestCase
{
    public function testWorkingServerStatus()
    {
        $monitor = new Redis('127.0.0.1', 6379);
        $this->assertTrue($monitor->status);
    }

    public function testUnknownServerStatus()
    {
        $monitor = new Redis('123.456.789.10', 6379);
        $this->assertFalse($monitor->status);
    }


}