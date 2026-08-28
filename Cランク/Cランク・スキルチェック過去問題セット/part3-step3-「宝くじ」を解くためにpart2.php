<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $winningNumber = trim(fgets(STDIN));
    $N = trim(fgets(STDIN));
    $numbers = [];
    for ($i = 0; $i < $N; $i++) {
        $numbers[] = trim(fgets(STDIN));
        if ($numbers[$i] == $winningNumber ) {
            echo "first\n";
        } else {
            echo "blank\n";
        }
    }
?>