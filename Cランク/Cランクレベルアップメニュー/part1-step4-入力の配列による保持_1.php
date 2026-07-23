<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    $max = 0;
    for ($i = 0; $i < $n; $i++) {
         $number = trim(fgets(STDIN));
         if ($number > $max) {
             $max = $number;
         }
    }
    echo "$max\n";
?>