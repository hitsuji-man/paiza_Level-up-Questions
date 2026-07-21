<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $max = 0;
    $product = 0;
    for ($i = 1; $i <= 98; $i++) {
        for ($j = 1; $j <= 98; $j++) {
            if (($i * $i * $i + $j * $j * $j) < 100000) {
                $product = $i * $j;
                if ($product > $max) {
                    $max = $product;
                }
            }
        }
    }
    echo "$max\n";
?>