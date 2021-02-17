<?php


use PHPUnit\Framework\TestCase;

class Test extends TestCase
{


    public function testBasicTest()
    {
        $response = $this->get('/api/order');

        $response->assertStatus(200);
    }

}
