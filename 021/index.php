<?php

require __DIR__ . '/Kibiras2.php';
require __DIR__ . '/Kibiras3.php';
require __DIR__ . '/KibirasNePo1.php';
require __DIR__ . '/MarsoPalydovas.php';



// U3
// $k1 = new Kibiras2;
// $k2 = new Kibiras2;
// $k3 = new Kibiras2;

// $k1->prideti1Akmeni();
// $k2->pridetiDaugAkmenu(8);
// $k3->prideti1Akmeni();
// $k1->prideti1Akmeni();
// $k1->prideti1Akmeni();
// $k2->pridetiDaugAkmenu(8);
// $k3->prideti1Akmeni();

// echo '<h1>'. Kibiras2::bendrasAkmenuKiekisS() .'</h1>';
// echo '<h1>'. $k3->bendrasAkmenuKiekisN() .'</h1>';


// U4

// $k1 = new KibirasNePo1(0, 1);
// $k2 = new KibirasNePo1(0, 2);
// $k3 = new KibirasNePo1(0, 3);

// $k1->prideti1Akmeni();
// $k1->prideti1Akmeni();

// $k2->prideti1Akmeni();

// $k3->prideti1Akmeni();
// $k3->pridetiDaugAkmenu(5);

// $k1->pridetiDaugAkmenu(10);

// $k1->kiekPririnktaAkmenu();
// $k2->kiekPririnktaAkmenu();
// $k3->kiekPririnktaAkmenu();


$p1 = MarsoPalydovas::naujasPalydovas();
$p2 = MarsoPalydovas::naujasPalydovas();
$p3 = MarsoPalydovas::naujasPalydovas();
$p4 = MarsoPalydovas::naujasPalydovas();
$p5 = MarsoPalydovas::naujasPalydovas();

echo '<pre>';
var_dump($p1);
var_dump($p2);
var_dump($p3);
var_dump($p4);
var_dump($p5);