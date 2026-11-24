<?php
    [$y, $x, $h] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    [$l1, $l2, $l3, $l4, $l5] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    [$m1, $m2, $m3, $m4, $m5, $m6] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $price = 0;

    if ($h <= $l1) {
        $b = ($y + $x) <= $l3;
        $a = max($y, $x) <= $l2;
        if ($b) {
            $price = $m2;
        } 
        if ($a) {
            $price = $m1;
        } 
        if(!$a && !$b) {
            $price = $m3;
        }
        echo $price . "\n";
    } else {
        $d = ($y + $x + $h) <= $l5;
        $c = max($y, $x, $h) <= $l4; 
        if ($d) {
            $price = $m5;
        }
        if ($c) {
            $price = $m4;
        }
        if (!$c && !$d) {
            $price = $y * $x * $h * $m6;    
        }
        echo $price . "\n";
    }