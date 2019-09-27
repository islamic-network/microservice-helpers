<?php


namespace IslamicNetwork\MicroServiceHelpers\tests\Unit;

use IslamicNetwork\MicroServiceHelpers\Monitors\MySql;
use PHPUnit\Framework\TestCase;

class MysqlTest extends TestCase
{
    public function testWorkingServerStatus()
    {
        $monitor = new MySql('0.0.0.0', 3306, 'circleci', 'circleci', 'circleci', 'SELECT 1 FROM circleci LIMIT 1');
        $this->assertTrue($monitor->status);
    }

    public function testUnknownServerStatus()
    {
        $monitor = new MySql('0.0.0.0', 3315, 'circleci', 'circleci', 'circleci', 'SELECT 1 FROM circleci LIMIT 1');
        $this->assertFalse($monitor->status);
    }

    public function testInvalidQuery()
    {
        $monitor = new MySql('0.0.0.0', 3315, 'circleci', 'circleci', 'circleci', 'SELECTa id from not_exists LIMIT 1');
        $this->assertFalse($monitor->status);
    }


}