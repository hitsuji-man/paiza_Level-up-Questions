<?php
    $Q = (int) trim(fgets(STDIN));

    $a[1] = 1;
    $a[2] = 1;
    for ($i = 1; $i <= $Q; $i++) { 
        $k = (int) trim(fgets(STDIN));
        for ($j = 3; $j <= $k; $j++) { 
            $a[$j] = $a[$j - 2] + $a[$j - 1];
        }
        echo $a[$k] . "\n";
    }