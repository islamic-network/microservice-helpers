<?php


namespace IslamicNetwork\MicroServiceHelpers\tests\Unit;

use IslamicNetwork\MicroServiceHelpers\Monitors\MySql;
use PHPUnit\Framework\TestCase;

class MysqlTest extends TestCase
{
    public function testWorkingServerStatus()
    {
        $monitor = new MySql('127.0.0.1', 3306, 'circleci', 'circleci', 'circleci', 'SELECT TIMESTAMP(\'2009-05-18\')');
        $this->assertTrue($monitor->status);
    }

    public function testUnknownServerOrBadUserStatus()
    {
        $monitor = new MySql('0.0.0.0', 3306, 'baduser', 'circleci', 'circleci', 'SELECT TIMESTAMP(\'2009-05-18\')');
        $this->assertFalse($monitor->status);
    }

    public function testInvalidQuery()
    {
        $monitor = new MySql('0.0.0.0', 3306, 'circleci', 'circleci', 'circleci', 'SELECTa id from not_exists LIMIT 1');
        $this->assertFalse($monitor->status);
    }


}