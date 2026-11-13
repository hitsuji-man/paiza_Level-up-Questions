<?php
    $Q = (int) trim(fgets(STDIN));

    $a[1] = 1;
    $a[2] = 1;
    for ($i = 3; $i <= 40; $i++) { 
        $a[$i] = $a[$i - 2] + $a[$i - 1];
    }

    for ($i = 1; $i <= $Q; $i++) { 
        $k = (int) trim(fgets(STDIN));
        echo $a[$k] . "\n";
    }