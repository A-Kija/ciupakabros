<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PirmasController extends Controller
{
    public function hello()
    {
        return '<h1 style="color:skyblue;">LABAS BRIEDI</h1>';
    }

    public function helloV()
    {
        return '<h1 style="color:brown;">LABAS VOVERE</h1>';
    }

    public function helloAnimal($animal)
    {
        return '<h1 style="color:brown;">LABAS '.$animal.'</h1>';
    }

    public function helloFancy($animal, $color)
    {
        return view('hello', [
            'animal' => $animal,
            'color' => $color
        ]);
    }

    public function sum($x, $y = 20)
    {
        $xySum = $x + $y;

        return view('sum.suma', [
            'rez' => $xySum
        ]);
    }


}
