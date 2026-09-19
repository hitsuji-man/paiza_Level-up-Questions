<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$N, $M] = explode(" ", trim(fgets(STDIN)));
    $total = 0;
    for ($i = 0; $i < $N; $i++) {
        $total += trim(fgets(STDIN));
        // echo "$total\n";
    }
    if ($total <= $M) {
        echo "OK\n";
    } else {
        echo "NG\n";
    }
?>