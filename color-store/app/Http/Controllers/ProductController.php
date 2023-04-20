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

        return redirect()->route('products-index');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        $cats = Cat::all();
        
        return view('back.products.edit', [
            'product' => $product,
            'cats' => $cats
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $product->update([
            'title' => $request->title,
            'price' => $request->price,
            'cat_id' =>$request->cat_id
        ]);

        $product->color()->delete();

        foreach ($request->color as $index => $color) {
            Color::create([
                'title' => $request->name[$index],
                'hex' => $color,
                'product_id' => $product->id
            ]);
        }

        return redirect()->route('products-index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products-index');
    }
}
