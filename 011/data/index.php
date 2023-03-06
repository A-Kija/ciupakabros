<?php


file_put_contents(__DIR__ . '/labas.txt', "\nRACOON", FILE_APPEND);

echo '<pre>';

echo file_get_contents(__DIR__ . '/labas.txt');