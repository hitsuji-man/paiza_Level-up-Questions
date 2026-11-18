<?php
    $n = (int) trim(fgets(STDIN));

    $isPrime = true;

    if ($n == 1) {
        $isPrime = false;
    }

    for ($i = 2; $i < $n; $i++) { 
        if ($n % $i == 0) {
            $isPrime = false;
        }
    }

    if ($isPrime) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }