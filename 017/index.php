<?php
//Antanina

require __DIR__ . '/Bebras.php';
require __DIR__ . '/Miskas.php';

$miskas333 = new Miskas;

$bebras1 = new Bebras;
$bebras2 = new Bebras;

echo '<pre>';


$bebras1->iMiska($miskas333);

// function fun($obj) {
//     $obj->spalva = 'raudona';
// }

// fun($bebras2);

// $bebras2->spalva = 'raudonas';
// $bebras1->spalva = 'juodas';

// echo "\n" . $bebras1->kokiaTavoSpalva() . "\n";

// echo "\n" . $bebras2->kokiaTavoSpalva() . "\n\n";

// $bebras2();

$bebras1->spalva = 'raudonas';

echo "\n" . $bebras1->derSumator(11, 12, 'a') . "\n";

echo "\n" . $bebras1->metai . "\n";

echo "\n" . $bebras1->kokiaNorsSpalva . "\n";




var_dump($bebras1);

var_dump($bebras2);