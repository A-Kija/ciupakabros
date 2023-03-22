<?php
use Ievos\Pievos\Read;
use Petro\Read as PR;

require __DIR__ . '/vendor/autoload.php';


$stock = new Read;
$cosmos = new PR;

$stock->getData();
$cosmos->getData();