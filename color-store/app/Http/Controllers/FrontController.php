<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cat;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        $products->map(function($p) use ($request) {
            if (!$request->user()) {
                $showVoteButton = false;
            } else {
                $rates = collect($p->rates);
                $showVoteButton = $rates->first(fn($r) => $r['userId'] == $request->user()->id) ? false : true;
            }
            $p->votes = count($p->rates);
            $p->showVoteButton = $showVoteButton;
        });



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

    public function vote(Request $request, Product $product)
    {
        if ($request->user()) {
            $userId = $request->user()->id;
            $rates = collect($product->rates);

            if (!$rates->first(fn($r) => $r['userId'] == $userId) && $request->star) {
                $stars = count($request->star);
                $userRate = [
                    'userId' => $userId,
                    'rate' => $stars
                ];
                $rates->add($userRate);
                $rate = round($rates->sum('rate') / $rates->count(), 2);

                $product->update([
                    'rate' => $rate,
                    'rates' => $rates,
                ]);
            }

            return redirect()->back();
        }
        
    }

}
