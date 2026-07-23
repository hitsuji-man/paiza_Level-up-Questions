<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    if (strlen($n) == 3) {
        echo "$n\n";
    } elseif (strlen($n) == 2) {
        echo "0" . $n . "\n";
    } elseif (strlen($n) == 1) {
        echo "00" . $n . "\n";
    }
?>