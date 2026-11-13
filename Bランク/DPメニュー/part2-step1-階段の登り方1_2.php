<?php
    $n = (int) trim(fgets(STDIN));

    $dp[0] = 1;
    for ($i = 1; $i <= $n; $i++) { 
        $dp[$i] = $dp[$i - 1];

        if ($i >= 2) {
            $dp[$i] = $dp[$i] + $dp[$i - 2];
        }
    }

    echo $dp[$n] . "\n";