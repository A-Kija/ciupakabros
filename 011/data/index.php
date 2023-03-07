<?php

// file_put_contents(__DIR__ . '/labas.txt', "\nRACOON", FILE_APPEND);

// echo '<pre>';

// echo file_get_contents(__DIR__ . '/labas.txt');

//JSON

// if (!file_exists(__DIR__ . '/data.json')) {
//     $data = [];
// } else {
//     $data = file_get_contents(__DIR__ . '/data.json');
//     $data = json_decode($data, 1);
// }

// echo '<pre>';
// print_r($data);

// $data[] = ['number' => rand(100, 999), 'color' => rand(0, 1) ? 'crimson' : 'skyblue'];

// $data = json_encode($data);
// $data = file_put_contents(__DIR__ . '/data.json', $data);

// SEREALIZE

if (!file_exists(__DIR__ . '/data.ser')) {
    $data = [];
} else {
    $data = file_get_contents(__DIR__ . '/data.ser');
    $data = unserialize($data);
}

echo '<pre>';
print_r($data);

$data[] = ['number' => rand(100, 999), 'color' => rand(0, 1) ? 'crimson' : 'skyblue'];

$data = serialize($data);
$data = file_put_contents(__DIR__ . '/data.ser', $data);
 