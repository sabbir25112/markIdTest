<?php

namespace Tests\Unit;

use App\Services\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private $calculator;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->calculator = new Calculator();
    }

    public function test_calculator_can_add_two_numbers()
    {
        $result = $this->calculator->add(5, 3);
        $this->assertEquals(8, $result);
    }

    public function test_calculator_will_throw_exception_on_non_numeric_value_in_addition_for_first_parameter()
    {
        $this->expectErrorMessage("Operand 1 is not numeric");
        $this->calculator->add("five", 3);
    }

    public function test_calculator_will_throw_exception_on_non_numeric_value_in_addition_for_second_parameter()
    {
        $this->expectErrorMessage("Operand 2 is not numeric");
        $this->calculator->add(5, "three");
    }

    public function test_calculator_can_subtract_two_numbers()
    {
        $result = $this->calculator->subtract(11, 3);
        $this->assertEquals(8, $result);
    }

    public function test_calculator_will_throw_exception_on_non_numeric_value_in_subtraction_for_first_parameter()
    {
        $this->expectErrorMessage("Operand 1 is not numeric");
        $this->calculator->subtract("eleven", 3);
    }

    public function test_calculator_will_throw_exception_on_non_numeric_value_in_subtraction_for_second_parameter()
    {
        $this->expectErrorMessage("Operand 2 is not numeric");
        $this->calculator->subtract(11, "three");
    }

    public function test_calculator_can_multiply_two_numbers()
    {
        $result = $this->calculator->multiply(11, 3);
        $this->assertEquals(33, $result);
    }

    public function test_calculator_will_throw_exception_on_non_numeric_value_in_multiply_for_first_parameter()
    {
        $this->expectErrorMessage("Operand 1 is not numeric");
        $this->calculator->multiply("eleven", 3);
    }

    public function test_calculator_will_throw_exception_on_non_numeric_value_in_multiply_for_second_parameter()
    {
        $this->expectErrorMessage("Operand 2 is not numeric");
        $this->calculator->multiply(11, "three");
    }

    public function test_calculator_can_divide_two_numbers()
    {
        $result = $this->calculator->divide(12, 3);
        $this->assertEquals(4, $result);
    }

    public function test_calculator_will_throw_exception_on_non_numeric_value_in_division_for_first_parameter()
    {
        $this->expectErrorMessage("Operand 1 is not numeric");
        $this->calculator->divide("twelve", 3);
    }

    public function test_calculator_will_throw_exception_on_non_numeric_value_in_division_for_second_parameter()
    {
        $this->expectErrorMessage("Operand 2 is not numeric");
        $this->calculator->divide(12, "three");
    }

    public function test_calculator_can_not_divide_by_zero()
    {
        $this->expectErrorMessage("Can't divide by Zero");
        $this->calculator->divide(12, 0);
    }
}
