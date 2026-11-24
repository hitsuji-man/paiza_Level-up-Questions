<?php
    [$y, $x, $h] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    [$l1, $l2, $l3, $l4, $l5] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    [$m1, $m2, $m3, $m4, $m5, $m6] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $price = 0;

    if ($h <= $l1) {
        if (max($y, $x) <= $l2) {
            $price = $m1;
        } elseif (($y + $x) <= $l3) {
            $price = $m2;
        } else {
            $price = $m3;
        }
        echo $price . "\n";
    } else {
        if (max($y, $x, $h) <= $l4) {
            $price = $m4;
        } elseif (($y + $x + $h) <= $l5) {
            $price = $m5;
        } else {
            $price = $y * $x * $h * $m6;    
        }
        echo $price . "\n";
    }