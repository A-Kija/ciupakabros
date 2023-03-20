<?php

require __DIR__ .'/Krepsys.php';
require __DIR__ .'/Grybas.php';

$krepsys = new Krepsys;


while ($krepsys->deti(new Grybas)){}

echo '<pre>';
var_dump($krepsys);