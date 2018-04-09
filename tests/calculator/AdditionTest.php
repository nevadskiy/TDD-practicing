<?php

use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function test_adds_up_given_operands()
    {
        $addition = new App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $this->assertEquals(15, $addition->calculate());
    }

    public function test_no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new App\Calculator\Addition;
        $addition->calculate();
    }
}
