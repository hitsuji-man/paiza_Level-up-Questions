<?php
    $k = (int) trim(fgets(STDIN));
    $a[1] = 1;
    $a[2] = 1;
    for ($i = 3; $i <= $k; $i++) { 
        $a[$i] = $a[$i - 2] + $a[$i - 1];
    }
    echo $a[$k] . "\n";