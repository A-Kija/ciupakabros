<?php

var_dump("1" == "01");

echo '<br>';

$jonas = rand(10, 20);
$petras = rand(5, 25);

if ($jonas > $petras) {
    echo "<h1>Jonas Laimi $jonas:$petras</h1>";
}
elseif ($jonas < $petras) {
    echo "<h1>Petras Laimi $jonas:$petras</h1>";
}
else {
    echo "<h1>Niekas $jonas:$petras</h1>";
}

$vienas = 3;
// $rezultatas = 1 == $vienas ? 'Yes' : 'No';




$rezultatas = $vienas ?? 8;
$vienas = 1;
// $rezultatas = $vienas ?? 8;

// echo "<h1>$rezultatas</h1>";

// $i = 0;

// echo '<h1 style="color:crimson">';


// if ($i == 0) {
//     echo 'i equals 0';
// } 
// elseif ($i == 1) {
//     echo 'i equals 1';
// } 
// elseif ($i == 2) {
//     echo 'i equals 2';
// }
// elseif ($i == 3) {
//     echo 'i equals 3';
// }
// else {
//     echo 'i equals nothing';
// }

// switch ($i) {
//     case 0:
//         echo 'i equals 0';
//         break;
//     case 1:
//         echo 'i equals 1';
//         break;
//     case 2:
//         echo 'i equals 2';
//         break;
//     case 3:
//         echo 'i equals 3';
//         break;
//     default: echo 'i equals nothing';
// }

// $what = match($i) {
//     0 => 'i equals 0',
//     1 => 'i equals 1',
//     2 => 'i equals 2',
//     3 => 'i equals 3',
//     default => 'i equals nothing',
// };
// echo $what;


$parcel = 'L';
echo '<h1 style="color:crimson">';

// if ($parcel == 'S') {
//     echo ' S ';
// }
// if ($parcel == 'S' || $parcel == 'M') {
//     echo ' M ';
// }
// if ($parcel == 'S' || $parcel == 'M' || $parcel == 'L') {
//     echo ' L ';
// }
// if ($parcel == 'S' || $parcel == 'M' || $parcel == 'L' || $parcel == 'XL') {
//     echo ' XL ';
// }

switch ($parcel) {
    case 'S': echo ' S ';
    case 'M': echo ' M ';
    case 'L': echo ' L ';
    default: echo ' XL ';
}



echo '</h1>';
