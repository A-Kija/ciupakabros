<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cat;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Services\ColorNamingService;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('back.products.index', [
            'products' => $products
        ]);
    }


    public function create()
    {
        
        $cats = Cat::all();
        
        return view('back.products.create', [
            'cats' => $cats
        ]);
    }

    public function colors(Request $request)
    {

        $colorsCount = Cat::where('id', $request->cat)->first()->colors_count;

        $html = view('back.products.colors')
        ->with(['colorsCount' => $colorsCount])
        ->render();

        return response()->json([
            'html' => $html,
            'message' => 'OK',
        ]);
    }

    public function colorName(Request $request, ColorNamingService $cns)
    {
        return response()->json([
            'name' => $cns->nameIt($request->color),
            'message' => 'OK',
        ]);
    }


    public function store(Request $request)
    {
        $id = Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'cat_id' =>$request->cat_id
        ])->id;

        foreach ( $request->color as $index => $color) {
            Color::create([
                'title' => $request->name[$index],
                'hex' => $color,
                'product_id' => $id
            ]);
        }

        return redirect()->back();
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
