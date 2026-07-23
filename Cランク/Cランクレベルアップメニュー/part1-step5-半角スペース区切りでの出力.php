<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    for ($i = 0; $i < $n; $i++) {
        echo "paiza";
        if ($i < $n - 1) {
            echo " ";
        } elseif ($i == $n - 1) {
            echo "\n";
        }
    }
?>