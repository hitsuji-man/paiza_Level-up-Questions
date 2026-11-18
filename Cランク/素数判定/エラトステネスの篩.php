<?php
    $N = (int) trim(fgets(STDIN));
    $is_prime = [];
    $is_prime = array_fill(0, $N + 1, true);
    $is_prime[0] = false;
    $is_prime[1] = false;

    for ($i = 2; $i <= $N; $i++) { 
        if ($is_prime[$i]) {
            for ($j = 2; $j * $i <= $N ; $j++) { 
                $is_prime[$j * $i] = false;
            }
        }
    }

    if ($is_prime[$N]) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }