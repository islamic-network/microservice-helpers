<?php


namespace IslamicNetwork\MicroServiceHelpers\tests\Unit;

use IslamicNetwork\MicroServiceHelpers\Monitors\Redis;
use PHPUnit\Framework\TestCase;

class RedisTest extends TestCase
{
    public function testWorkingServerStatus()
    {
        $monitor = new Redis('0.0.0.0', 6379);
        $this->assertTrue($monitor->status);
    }

    public function testUnknownServerStatus()
    {
        $monitor = new Redis('0.0.0.0', 6380);
        $this->assertFalse($monitor->status);
    }


}