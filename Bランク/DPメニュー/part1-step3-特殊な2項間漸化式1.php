<?php
    [$x, $d1, $d2, $k] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $a[1] = $x;
    for ($i = 2; $i <= $k; $i++) { 
        if ($i % 2 !== 0) {
            $a[$i] = $a[$i - 1] + $d1;
        } else {
            $a[$i] = $a[$i - 1] + $d2;
        }
    }
    echo $a[$k] . "\n";