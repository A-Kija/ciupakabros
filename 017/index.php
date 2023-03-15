<?php

require __DIR__ . '/Bebras.php';


$bebras1 = new Bebras;
$bebras2 = new Bebras;

echo '<pre>';


// function fun($obj) {
//     $obj->spalva = 'raudona';
// }

// fun($bebras2);

// $bebras2->spalva = 'raudonas';
// $bebras1->spalva = 'juodas';

echo "\n" . $bebras1->kokiaTavoSpalva() . "\n";

echo "\n" . $bebras2->kokiaTavoSpalva() . "\n\n";

$bebras2();


var_dump($bebras1);

var_dump($bebras2);