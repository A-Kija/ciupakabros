<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cat;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function download(Order $order)
    {


        $productNames = array_map(fn($p) => $p['title'], $order->products);

        $products = Product::whereIn('title', $productNames)->get();

        // return view('front.pdf',[
        //         'order' => $order,
        //         'products' => $products,
        // ]);

        $pdf = Pdf::loadView('front.pdf',[
            'order' => $order,
            'products' => $products,
        ]);

        return $pdf->download('order-'.$order->id.'.pdf');
    }

}
