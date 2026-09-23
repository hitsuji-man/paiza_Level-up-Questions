<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$N, $M] = explode(" ", trim(fgets(STDIN)));
    $count = 0;
    for ($i = 0; $i < $N; $i++) {
        $A = trim(fgets(STDIN));
         if ($A <= $M) {
             $count++;
         }
    }
    echo "$count\n";
?>