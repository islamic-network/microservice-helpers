<?php

namespace giffgaff\Tests;


namespace IslamicNetwork\MicroServiceHelpers\tests\Unit;
use IslamicNetwork\MicroServiceHelpers\Formatters\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class ResponseTest extends TestCase
{
    public function testStatuses()
    {
        $this->assertEquals('OK', Response::getStatusByCode(200));
    }
}