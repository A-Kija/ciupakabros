<?php
echo '<pre>';

// $arr = array('Racoon', 'Beaver', 'Fox');


$arr = [
    300 => 'Racoon',
    200 => 'Beaver',
    'Fox'
];

// array_push($arr, 'Wolf');
$arr[4] = 'Wolf';
$arr['- - - - -'] = 'Rabbit';
$arr[] = 'Moose';

// print_r($arr);
// echo '<br>';

// array_unshift($arr, 'Cat');
// array_shift($arr);
// array_pop($arr);

// usort($arr, fn($a, $b) => $b <=> $a);

// $json =  json_encode($arr);

// echo $json;

// echo '<br>';

// $arr = array_values($arr);

// $json =  json_encode($arr);

// echo $json;


// print_r($arr);

$colors = [
    ['red', 'crimson'],
    ['green'],
    ['blue', 'skyblue'],
    ['yellow']
];

// $value = &$colors[1];

// foreach ($colors as $index => &$value) {}

// unset($value);

// foreach ($colors as $value) {
//     if (is_array($value)) {
//         foreach ($value as $value2) {
//             echo 'Reikšmė: ' .$value2 . '<br>';
//         }
//     }
//     else {
//         echo 'Reikšmė: ' .$value . '<br>';
//     }
// }

// foreach ($colors as $value) {
//     foreach ($value as $value2) {
//         echo 'Reikšmė: ' .$value2 . '<br>';
//     }
// }

// $varna1 = 'black';
// $varna2 = &$varna1;
// $varna1 = 'white';

// echo $varna1, ' - ', $varna2;



// print_r($colors);

for ($x = 0; $x < 5; $x++) {
    echo 'Numeris: '.($x + 1).' <br>';
}

foreach (range(7, 9) as $x) {
    echo 'Numeris: '.$x.' <br>';
}

// print_r(range(1, 5));


