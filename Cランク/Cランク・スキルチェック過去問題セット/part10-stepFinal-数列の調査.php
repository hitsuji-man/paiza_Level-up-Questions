<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    $sequence = array_map('intval', explode(" ", trim(fgets(STDIN))));
    // print_r($sequence);

    $isArithmetic = true;   // 等差数列
    $isGeometric = true;    // 等比数列

    $difference = $sequence[1] - $sequence[0];

    for ($i = 2; $i < $N; $i++) { 
        // 等差数列: 差が最初の2項と同じか
        if ($sequence[$i] - $sequence[$i - 1] !== $difference) {
            $isArithmetic = false;
        }

        // 等比数列: 比が最初の2項の比と同じか
        if ($sequence[$i] * $sequence[0] !== $sequence[$i - 1] * $sequence[1]) {
            $isGeometric = false;
        }
    }

    // N=2の場合はループは実行されず必ずYesになる。0でない2項だけなら、公差も公比も必ず求められるため。
    echo ($isArithmetic ? "Yes" : "No") . "\n";
    echo ($isGeometric ? "Yes" : "No") . "\n";
?>