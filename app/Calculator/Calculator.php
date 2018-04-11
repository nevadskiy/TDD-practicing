<?php

namespace App\Calculator;

class Calculator
{
    /**
     * Operations
     *
     * @var array
     */
    protected $operations = [];

    /**
     * Setting operation
     *
     * @param OperationInterface $operation
     * @return void
     */
    public function setOperation(OperationInterface $operation)
    {
        $this->operations[] = $operation;
    }

    /**
     * Getting operations
     *
     * @return void
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * Setting operations
     *
     * @param array $operations
     * @return void
     */
    public function setOperations(array $operations)
    {
        $filteredOperations = array_filter($operations, function($operation) {
            return $operation instanceof OperationInterface;
        });

        $this->operations = array_merge($this->operations, $filteredOperations);
    }

    /**
     * Calculating
     *
     * @return void
     */
    public function calculate()
    {
        if (count($this->operations) > 1) {
            return array_map(function($operation) {
                return $operation->calculate();
            }, $this->operations);
        }

        return $this->operations[0]->calculate();
    }
}
