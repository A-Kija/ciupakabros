<?php

namespace App\Entities;

use App\Models\Product;

class Cart
{

    private $products;

    public function __construct(array $cart) 
    {
        $productsId = array_keys($cart);
        $this->products = Product::whereIn('id', $productsId)->get();
        $this->products = $this->products->map(function($p) use ($cart) {
            $p->count = $cart[$p->id];
            return $p;
        });
    }


    public function total()
    {
        return $this->products->reduce(function ($carry, $item) {
            return $carry + $item->count * $item->price;
        }, 0);
    }

    public function products()
    {
        return $this->products;
    }

}