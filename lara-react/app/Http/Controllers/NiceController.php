<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class NiceController extends Controller
{
    public function index()
    {
        // return view('blade-name', []); with blade


        
        return Inertia::render('Nice', 
        [
            'color' => 'orange',
            'text' => 'Have a nice day',
            'ls' => 8,
        ]);
    }
}
