<?php
    [$n, $x] = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $mod = 1000000007;

    // $dp[$sum] は、処理済みのおもりで合計 $sum を作る方法の数。
    $dp = array_fill(0, $x + 1, 0);
    $dp[0] = 1; // 何も選ばない方法。

    for ($i = 0; $i < $n; $i++) {
        $weight = (int) trim(fgets(STDIN));

        // 大きい合計から更新し、同じおもりを二度使わないようにする。
        for ($sum = $x; $sum >= $weight; $sum--) {
            // 今のおもりを選ばない場合（$dp[$sum]）と、選ぶ場合（$dp[$sum - $weight]）の通り数を足し、$mod で割った余りを保存する。
            $dp[$sum] = ($dp[$sum] + $dp[$sum - $weight]) % $mod;
        }
    }

    echo $dp[$x], "\n";
