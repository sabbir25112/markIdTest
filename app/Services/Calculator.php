<?php

namespace App\Services;

class Calculator
{
    const ADDITION = 'addition';
    const SUBTRACTION = 'subtraction';
    const MULTIPLICATION = 'multiplication';
    const DIVISION = 'division';

    public function add($operand1, $operand2)
    {
        if (!is_numeric($operand1)) throw new \Exception("Operand 1 is not numeric");
        if (!is_numeric($operand2)) throw new \Exception("Operand 2 is not numeric");

        return $operand1 + $operand2;
    }

    public function subtract($operand1, $operand2)
    {
        if (!is_numeric($operand1)) throw new \Exception("Operand 1 is not numeric");
        if (!is_numeric($operand2)) throw new \Exception("Operand 2 is not numeric");

        return $operand1 - $operand2;
    }

    public function multiply($operand1, $operand2)
    {
        if (!is_numeric($operand1)) throw new \Exception("Operand 1 is not numeric");
        if (!is_numeric($operand2)) throw new \Exception("Operand 2 is not numeric");

        return $operand1 * $operand2;
    }

    public function divide($operand1, $operand2)
    {
        if (!is_numeric($operand1)) throw new \Exception("Operand 1 is not numeric");
        if (!is_numeric($operand2)) throw new \Exception("Operand 2 is not numeric");
        if ($operand2 == 0) throw new \Exception("Can't divide by Zero");

        return number_format($operand1 / $operand2, 2);
    }
}
