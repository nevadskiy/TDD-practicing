<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {   
        if (count($this->operands) === 0) {
            throw new NoOperandsException;
        }

        // array_filter without callback returns only not null, not 0, not false values
        return array_reduce(array_filter($this->operands), function ($result, $item) {
            if ($result && $item) {
                return $result / $item;
            }

            return $item;
        });
    }
}
