<?php
    [$n, $x] = array_map('intval', explode(' ', trim(fgets(STDIN))));

    // n 個を超える値を、作れない重さの目印とする。
    $unreachable = $n + 1;
    $dp = array_fill(0, $x + 1, $unreachable);
    $dp[0] = 0;     // 重さの和を0にするための必要な重りは0個

    for ($i = 0; $i < $n; $i++) {
        $weight = (int) trim(fgets(STDIN));

        // 重さの和が大きい順に更新すると、同じおもりを再利用しない。
        for ($sum = $x; $sum >= $weight; $sum--) {
            // $dp[$sum]: 重さの和$sumを作るために、必要なお守りの最小個数
            // 今のおもりを選ばない場合($dp[$sum])と、残りの重さを作ってから今のおもりを1個足す場合($dp[$sum - $weight])のうち、個数が少ない方を残す。
            $dp[$sum] = min($dp[$sum], $dp[$sum - $weight] + 1);
        }
    }

    echo $dp[$x] === $unreachable ? -1 : $dp[$x], "\n";
