<?php

namespace App\Http\Controllers;

use App\Services\Calculator;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        $this->validate($request, [
            'operand1' => 'required|numeric',
            'operand2' => 'required|numeric',
            'operator' => 'required|in:'.implode(',', supportedOperators())
        ]);

        $operand1 = $request->operand1;
        $operand2 = $request->operand2;
        $operator = $request->operator;

        $result = null;
        $error = false;
        $success = true;
        $error_message = "";

        try {
            $calculator = new Calculator();


            switch ($operator){
                case Calculator::ADDITION:
                    $result = $calculator->add($operand1, $operand2);
                    break;
                case Calculator::SUBTRACTION:
                    $result = $calculator->subtract($operand1, $operand2);
                    break;
                case Calculator::MULTIPLICATION:
                    $result = $calculator->multiply($operand1, $operand2);
                    break;
                case Calculator::DIVISION:
                    $result = $calculator->divide($operand1, $operand2);
                    break;
            }
        } catch (\Exception $exception) {
            $error = true;
            $success = false;
            $error_message = $exception->getMessage();
        }

        return response()->json([
            'success'       => $success,
            'result'        => $result,
            'error'         => $error,
            'error_message' => $error_message,
        ]);
    }
}
