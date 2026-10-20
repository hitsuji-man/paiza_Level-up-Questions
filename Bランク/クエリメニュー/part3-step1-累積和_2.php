<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // 累積和
    // $sum[$i]に A_1 から A_i までの合計を保存
    $sum = [0];

    for ($i = 1; $i <= $N; $i++) { 
        $a = (int) trim(fgets(STDIN));
        $sum[$i] = $sum[$i - 1] + $a;
    }

    for ($i = 0; $i < $K; $i++) { 
        $q = (int) trim(fgets(STDIN));
        // 各質問は $sum[$q]を参照するだけなので O(1)。このループでは O(K)
        // 全体の計算量は O(N + K)
        echo $sum[$q] . "\n";
    }