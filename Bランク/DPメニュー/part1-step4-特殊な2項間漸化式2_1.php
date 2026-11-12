<?php
    [$x, $d1, $d2] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $Q = (int) trim(fgets(STDIN));

    $a[1] = $x;
    for ($i = 1; $i <= $Q; $i++) { 
        $k = (int) trim(fgets(STDIN));
        for ($j = 2; $j <= $k; $j++) { 
            if ($j % 2 !== 0) {
                $a[$j] = $a[$j - 1] + $d1;
            } else {
                $a[$j] = $a[$j - 1] + $d2;
            }
        }
        echo $a[$k] . "\n";
    }