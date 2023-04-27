<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cat;
use App\Models\Order;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('front.index', [
            'products' => $products
        ]);
    }

    public function catColors(Cat $cat)
    {
        $products = $cat->product;

        return view('front.cat-index', [
            'products' => $products,
            'cat' => $cat
        ]);
    }

    public function showProduct(Product $product)
    {
        return view('front.product', [
            'product' => $product,
        ]);
    }

    public function orders(Request $request)
    {
        $orders = $request->user()->order;

        return view('front.orders', [
            'orders' => $orders,
            'status' => Order::STATUS
        ]);
    }
}
