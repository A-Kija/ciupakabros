<?php
use Ievos\Pievos\Read;
use Petro\Read as PR;

require __DIR__ . '/bebras/Go.php';
require __DIR__ . '/ieva/Read.php';
require __DIR__ . '/petras/Read.php';


$stock = new Read;
$cosmos = new PR;

$stock->getData();
$cosmos->getData();