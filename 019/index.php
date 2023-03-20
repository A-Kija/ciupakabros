<?php

require __DIR__ . '/Miskas.php';
require __DIR__ . '/Zveris.php';



$bebras = new Zveris('Bebras', 'Raudona', 'Grazus miskas');

// $bebras->bu();

echo '<pre>';
var_dump($bebras);
$bebras->sayTevoBu();





