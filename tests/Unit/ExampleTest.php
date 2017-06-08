<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
    	$bool = 1 > 2;
        $this->assertTrue($bool);
    }


    public function testBasicTest2()
    {
    	$bool = 5 > 19;
        $this->assertTrue($bool);
    }
}
