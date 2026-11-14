<?php
    $n = (int) trim(fgets(STDIN));
    for ($i = 1; $i <= $n; $i++) { 
        $a[$i] = (int) trim(fgets(STDIN));
    }

    $dp[1] = 1;
    for ($i = 2; $i <= $n; $i++) { 
        if ($a[$i - 1] <= $a[$i]) {
            $dp[$i] = $dp[$i - 1] + 1;
        } else {
            $dp[$i] = 1;
        }
    }

    $max = max($dp);
    echo $max . "\n";
