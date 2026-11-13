<?php
    [$n, $a, $b] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $dp[0] = 0;
    $dp[1] = $a;
    for ($i = 2; $i <= $n; $i++) {
        // 「i-1個の最小金額に1個分のa円を足す場合」と「i-2個の最小金額に2個分のb円を足す場合」の安い方を選ぶ 
        $dp[$i] = min($dp[$i - 1] + $a, $dp[$i - 2] + $b);
    }
    echo $dp[$n];