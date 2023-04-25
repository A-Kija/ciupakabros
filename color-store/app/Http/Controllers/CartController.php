<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Cart;

class CartController extends Controller
{
    public function add(Request $request)
    {

        $id = (int) $request->id;
        $count = (int) $request->count;
        
        $cart = $request->session()->get('cart', []);

        if (!isset($cart[$id])) {
            $cart[$id] = $count;
        } else {
            $cart[$id] += $count;
        }

        $request->session()->put('cart', $cart);

        $Cart = new Cart($cart);


        
        return response()->json([
            'count' => count($cart),
            'total' => $Cart->total()
        ]);
    }
}
