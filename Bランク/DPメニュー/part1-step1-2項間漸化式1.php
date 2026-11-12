<?php
    [$x, $d, $k] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $a[1] = $x;
    for ($i= 2; $i <= $k; $i++) { 
        $a[$i] = $a[$i - 1] + $d;
    }

    echo $a[$k] . "\n";