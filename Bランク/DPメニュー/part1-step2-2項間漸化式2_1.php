<?php
    [$x, $d] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $Q = (int) trim(fgets(STDIN));
    $k = [];
    for ($i = 1; $i <= $Q; $i++) { 
        $k[$i] = (int) trim(fgets(STDIN));
    }

    $a[1] = $x;
    // kのmaxまでの数列を用意する
    $kMax = max($k);
    for ($i = 2; $i <= $kMax; $i++) { 
        $a[$i] = $a[$i - 1] + $d;
    }

    for ($i = 1; $i <= $Q; $i++) { 
        echo $a[$k[$i]] . "\n";
    }