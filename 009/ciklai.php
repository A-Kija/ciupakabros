<?php

// for ($x = 0; $x < 5; $x++) {
//     echo 'Numeris: '.$x.' <br>';
// }


// $sk = rand(0, 10); // kai 9 ar daugiau
// $sk2 = rand(1, 6); // arba 2 ir maziau

// while ($sk < 9 && $sk2 > 2) {
//    echo $sk . ' '. $sk2 . '<br>';
//    $sk = rand(0, 10);
//    $sk2 = rand(1, 6);
// }

// do {
//     $sk = rand(0, 10);
//     $sk2 = rand(1, 6);
//     echo $sk . ' '. $sk2 . '<br>';
//  } while ($sk < 9 && $sk2 > 2);

// echo "<h2>$sk $sk2</h2>";


// !=  <=> ==
// >   <=> <=
// <   <=> >=
// ||  <=> &&


for ($x = 0; $x < 5; $x++) {
    echo '<h3 style="color:skyblue; margin: 5px;">' . $x . '</h3>';

    for ($a = 0; $a < 5; $a++) {
        echo '<span style="color:crimson; margin: 2px;">' . $a . '</span>';
        if ($a == 2) {
            continue 2;
            // break;
        }
    }

}



// for ($x = 0; $x < 5; $x++) {

//     // if ($x == 2) {
//     //     continue;
//     // }

//     if($x != 2) {
//         echo '<h3 style="color:skyblue">' . $x . '</h3>';
//     }

    


 
    
// }










 