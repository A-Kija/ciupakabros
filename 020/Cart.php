<?php

class Cart {

    private static $cart;

    private function __construct(){}
    private function __clone(){}
    
    public static function makeCart()
    {
        return self::$cart ?? self::$cart = new self;
    }

}