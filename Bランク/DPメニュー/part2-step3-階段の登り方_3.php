<?php
    [$n, $a, $b, $c] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $dp[0] = 1;
    for ($i = 1; $i <= $n; $i++) { 
        $dp[$i] = 0;    // 数える前に合計を0にする処理
        if ($i >= $a) {
            $dp[$i] = $dp[$i] + $dp[$i - $a];    // a段下から、a段登って到着する方法
        } 
        if ($i >= $b) {
            $dp[$i] = $dp[$i] + $dp[$i - $b];    // b段下から、b段登って到着する方法
        }
        if ($i >= $c) {
            $dp[$i] = $dp[$i] + $dp[$i - $c];    // c段下から、c段登って到着する方法
        }
    }

    echo $dp[$n] . "\n";