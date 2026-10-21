<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    
    // $sum[$i] = Aの先頭からi個の合計
    $sum = [0];

    // 累積和を使う
    // $sum[$i]に A_1 から A_i までの合計を保存
    for ($i= 1; $i <= $N; $i++) { 
        $a = (int) trim(fgets(STDIN));
        $sum[$i] = $sum[$i - 1] + $a;
    }

    // 区間和
    // 累積和を使うと、区間[l, r]の和を$sum[$r] - $sum[$l - 1]で求められる(A_lも含めたいので l-1 を指定)
    // 計算量は　O(N + K)
    for ($i = 0; $i < $K; $i++) { 
        [$l, $r] = array_map('intval', explode(" ", trim(fgets(STDIN))));
        echo ($sum[$r] - $sum[$l - 1]) . "\n";
    }
