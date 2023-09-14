<?php

namespace Tests\Unit;

use App\accounthelper;
use PHPUnit\Framework\TestCase;
class accountTest extends TestCase{
    /** @test */
    function find_profit()
    {
        $profit = accounthelper::profit(100);
        $this->assertEquals(10,$profit);
    }
}
