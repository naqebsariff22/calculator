<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function index()
    {
        return view('calc');
    }

    public function calculate(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $op   = $request->input('operator');

        if ($op === '/' && $num2 == 0) {
            return redirect()->route('calc.index')->with('error', 'Cannot divide by zero!');
        }

        $result = match ($op) {
            '+' => $num1 + $num2,
            '-' => $num1 - $num2,
            '*' => $num1 * $num2,
            '/' => $num1 / $num2,
            default => null
        };

        $equation = "$num1 $op $num2";
        $history = session('history', []);
        $history[] = ['equation' => $equation, 'result' => $result];
        session(['history' => $history]);

        return redirect()->route('calc.index')->with('result', $result);
    }

    public function edit($index)
    {
        session(['editing' => $index]);
        return redirect()->route('calc.index');
    }

    public function update(Request $request, $index)
{
    $num1 = $request->input('edit_num1');
    $num2 = $request->input('edit_num2');
    $op   = $request->input('edit_operator');

    if ($op === '/' && $num2 == 0) {
        return redirect()->route('calc.index')->with('error', 'Cannot divide by zero!');
    }

    $result = match ($op) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2,
        '/' => $num1 / $num2,
        default => null
    };

    $equation = "$num1 $op $num2";
    $history = session('history', []);
    $history[$index] = ['equation' => $equation, 'result' => $result];
    session(['history' => $history]);

    session()->forget('editing');
    return redirect()->route('calc.index');
}


    public function cancelEdit()
{
    session()->forget('editing');
    return redirect()->route('calc.index')->withInput([]);
}


    public function delete($index)
    {
        $history = session('history', []);
        if (isset($history[$index])) {
            unset($history[$index]);
        }
        session(['history' => array_values($history)]);
        return redirect()->route('calc.index');
    }
}
