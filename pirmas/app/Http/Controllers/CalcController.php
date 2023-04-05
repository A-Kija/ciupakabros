<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function show(Request $request)
    {

        $rez = $request->session()->pull('rez', '');

        return view('calc.form', ['rez' => $rez]);
    }

    public function doCalc(Request $request)
    {
        $rez = $request->x + $request->y;

        // $request->session()->put('rez', $rez);

        $request->flash();
        
        return redirect()->back()->with('rez', $rez);
    }
}
