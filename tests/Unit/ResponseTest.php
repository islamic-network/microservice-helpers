<?php

namespace IslamicNetwork\MicroServiceHelpers\tests\Unit;

use IslamicNetwork\MicroServiceHelpers\Formatters\Response;
use PHPUnit\Framework\TestCase;


class ResponseTest extends TestCase
{
    public function testStatuses()
    {
        $this->assertEquals('OK', Response::getStatusByCode(200));
    }
}