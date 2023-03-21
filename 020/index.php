<?php

require __DIR__ . '/TV.php';
require __DIR__ . '/Cart.php';
require __DIR__ . '/Tevas.php';
require __DIR__ . '/Vaikas.php';
require __DIR__ . '/FontSize.php';
require __DIR__ . '/Word.php';
require __DIR__ . '/Color.php';

$tv1 = new TV;
$tv2 = new TV;
$tv3 = new TV;

$tv1->kanalas = 7;
$tv3->kanalas = 55;



$kanalai = [
    5 => 'Discovery',
    7 => 'Animal Planet',
    55 => 'MTV',
    91 => 'BBC'
];

TV::$kanalai = $kanalai;

// visiems
// $tv1->kanalai = $kanalai;
// $tv2->kanalai = $kanalai;
// $tv3->kanalai = $kanalai;

// $tv1->kanalas = 91;
// $tv2->kanalas = 55;
// $tv3->kanalas = 91;




// $tv1->koksKanalasIjungtas();
// $tv2->koksKanalasIjungtas();
// $tv3->koksKanalasIjungtas();


$cart1 = Cart::makeCart();
$cart2 = Cart::makeCart();

echo '<pre>';

// var_dump($cart1);
// var_dump($cart2);


// Vaikas::sayName();

$word = new Color;

$word->fontSize();
$word->animal();