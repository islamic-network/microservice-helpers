<?php


namespace IslamicNetwork\MicroServiceHelpers\tests\Unit;

use IslamicNetwork\MicroServiceHelpers\Monitors\Memcached;
use PHPUnit\Framework\TestCase;

class MemcachedTest extends TestCase
{
    public function testWorkingServerStatus()
    {
        $monitor = new Memcached('127.0.0.1', 11211);
        $this->assertTrue($monitor->status);
    }

    public function testUnknownServerStatus()
    {
        $monitor = new Memcached('123.456.789.10', 11211);
        $this->assertFalse($monitor->status);
    }


}