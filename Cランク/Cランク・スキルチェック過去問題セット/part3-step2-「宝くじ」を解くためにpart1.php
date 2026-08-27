<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $winningNumber = trim(fgets(STDIN));
    $N = trim(fgets(STDIN));
    $numbers = [];
    echo "$winningNumber\n";
    echo "$N\n";
    for ($i = 0; $i < $N; $i++) {
        $numbers[] = (int) trim(fgets(STDIN));
        echo "$numbers[$i]\n";
    }
?>