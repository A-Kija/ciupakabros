<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        
        return view('orders.index', [
            'orders' => $orders
        ]);
    }


    public function create(Request $request)
    {
        $clients = Client::all();

        $id = $request->id ?? 0;
        
        return view('orders.create', [
            'clients' => $clients,
            'id' => $id
        ]);
    }


    public function store(Request $request)
    {
        Order::create([
            'title' => $request->title,
            'price' => $request->price,
            'client_id' => $request->client_id,
        ]);

        return redirect()->back();
    }


    public function show(Order $order)
    {
        //
    }


    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {
        //
    }
}
