<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Cart;
use App\Models\Order;

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

    public function rem(Request $request)
    {

        $id = (int) $request->id;
        $cart = $request->session()->get('cart', []);
        unset($cart[$id]);
        $request->session()->put('cart', $cart);

        return redirect()->back();
        
    }

    public function update(Request $request)
    {

        $id = (int) $request->id;
        $count = (int) $request->count;
        $cart = $request->session()->get('cart', []);

        $cart[$id] = $count;
    
        $request->session()->put('cart', $cart);

        return redirect()->back();

    }

    public function miniCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $Cart = new Cart($cart);
        return response()->json([
            'count' => count($cart),
            'total' => $Cart->total()
        ]);
    }

    public function showCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $Cart = new Cart($cart);

        return view('front.cart', [
            'count' => count($cart),
            'total' => $Cart->total(),
            'products' => $Cart->products()
        ]);
    }

    public function buy(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $Cart = new Cart($cart);

        $products = [];
        $total = 0;

        $Cart->products()->each(function($p, $key) use (&$total, &$products) {

            

            $products[$key]['title'] = $p->title;
            $products[$key]['count'] = $p->count;
            $products[$key]['price'] = $p->price;
            $products[$key]['total'] = $p->count * $p->price;
            $total += $products[$key]['total'];

     
        });

        // $products = json_encode($products);
        $userId = $request->user()->id;

        Order::create([
            'products' => $products,
            'user_id' => $userId,
            'price' => $total
        ]);

        $request->session()->put('cart', []);


        return redirect()->route('front-index');

    }


}
