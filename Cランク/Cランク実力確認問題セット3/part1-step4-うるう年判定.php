<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    if ($N % 400 == 0) {
        echo "Leap\n";
    } elseif ($N % 100 == 0) {
        echo "Common\n";
    } elseif ($N % 4 == 0) {
        echo "Leap\n";
    } else {
        echo "Common\n";
    }
?>