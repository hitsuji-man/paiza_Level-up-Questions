<?php
    [$n, $a, $b] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // intdiv($n, 2): 2個の組の数
    // min(2 * $a, $b): 2個を買う最小金額
    // ($n % 2) * $a: 奇数の場合の残り1個の金額
    $total = intdiv($n, 2) * min(2 * $a, $b) + ($n % 2) * $a;

    echo $total . "\n";