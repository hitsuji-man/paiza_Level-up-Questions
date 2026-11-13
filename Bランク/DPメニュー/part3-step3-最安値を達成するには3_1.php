<?php
    [$n, $x, $a, $y, $b] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $limit = $n + $y - 1;
    // 初期値を購入不可能にしておく
    $dp = array_fill(0, $limit + 1, PHP_INT_MAX);
    $dp[0] = 0;

    for ($i = 1; $i <= $limit; $i++) { 
        if ($i >= $x && $dp[$i - $x] !== PHP_INT_MAX) {
            $dp[$i] = min($dp[$i], $dp[$i - $x] + $a);
        }

        if ($i >= $y && $dp[$i - $y] !== PHP_INT_MAX) {
            $dp[$i] = min($dp[$i], $dp[$i - $y] + $b);
        }
    }

    $answer = PHP_INT_MAX;
    // n 個以上買う場合の最小金額
    for ($i = $n; $i <= $limit; $i++) { 
        $answer = min($dp[$i], $answer);
    }

    echo $answer . "\n";