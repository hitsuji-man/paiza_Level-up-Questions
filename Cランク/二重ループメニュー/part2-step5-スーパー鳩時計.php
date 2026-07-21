<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    for ($i = 0; $i <=23; $i++) {
        for ($j = 0; $j <= 59; $j++) {
             if (($i + $j) % 15 == 0) {
                 echo "FIZZBUZZ\n";
             } elseif (($i + $j) % 3 == 0) {
                 echo "FIZZ\n";
             } elseif (($i + $j) % 5 == 0) {
                 echo "BUZZ\n";
             } else {
                 echo "\n";
             }
        }
    }
?>