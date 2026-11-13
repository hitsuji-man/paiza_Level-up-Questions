<?php
    [$x, $d1, $d2] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $Q = (int) trim(fgets(STDIN));
    $k = [];
    for ($i = 1; $i <= $Q; $i++) { 
        $k[$i] = (int) trim(fgets(STDIN));
    }

    $a[1] = $x;
    $kMax = max($k);
    for ($i = 2; $i <= $kMax; $i++) { 
        if ($i % 2 !== 0) {
            $a[$i] = $a[$i - 1] + $d1; 
        } else {
            $a[$i] = $a[$i - 1] + $d2;
        }
    }

    for ($i = 1; $i <= $Q; $i++) { 
        echo $a[$k[$i]] . "\n";
    }