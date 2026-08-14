<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$A, $B] = explode(" ", trim(fgets(STDIN)));
    if ($A <= $B) {
        echo "1\n";
    } else {
        echo "0\n";
    }
?>