<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    $number = [];
    for ($i = 0; $i < $n; $i++) {
         $number[] = intval(trim(fgets(STDIN)));
    }
    echo max($number);
?>