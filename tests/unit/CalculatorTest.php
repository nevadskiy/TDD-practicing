<?php

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{   
    /** @test */
    public function can_set_single_operation()
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_set_multiple_operations()
    {
        $addition1 = new App\Calculator\Addition;
        $addition1->setOperands([5, 10]);

        $addition2 = new App\Calculator\Addition;
        $addition2->setOperands([2, 2]);

        $calculator = new App\Calculator\Calculator;
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    /** @test */
    public function operations_are_ignored_if_not_instance_of_operation_interface()
    {
        $addition = new App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new App\Calculator\Calculator;
        $calculator->setOperations([$addition, '$addition2']);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_calculate_result()
    {
        $addition = new App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertSame(15, $calculator->calculate());
    }

    /** @test */
    public function can_multiple_calculation()
    {
        $addition = new App\Calculator\Addition;
        $addition->setOperands([5, 10]); // 15

        $division = new App\Calculator\Division;
        $division->setOperands([50, 2]); // 25

        $calculator = new App\Calculator\Calculator;
        $calculator->setOperations([$addition, $division]);

        $this->assertInternalType('array', $calculator->calculate());
        $this->assertSame(15, $calculator->calculate()[0]);
        $this->assertSame(25, $calculator->calculate()[1]);
    }
}