<?php
    [$x, $d] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $Q = (int) trim(fgets(STDIN));

    $a[1] = $x;
    for ($i = 1; $i <= $Q; $i++) { 
        $k = trim(fgets(STDIN));
        for ($j = 2; $j <= $k; $j++) { 
            $a[$j] = $a[$j - 1] + $d;
        }

        echo $a[$k] . "\n";
    }