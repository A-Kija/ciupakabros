<?php

$a = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';

echo $a;

$a = 'fhfghgfhgfh 58 gfhgfhgfhgfhgfhgfh 6687498749 gfhfd 7897897987 gfh';

preg_match_all('/(\d)(\d+)/', $a, $result);

echo '<pre>';

// print_r($result);

$p1 = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";

$p2 = "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";

$rez = str_word_count($p2, 1, 'ąų');

print_r($rez);
$count = 0;

foreach($rez as $word) {
    if (mb_strlen($word) <= 5) {
        $count++; 
    }
}

echo "<h2>$count</h2>";

