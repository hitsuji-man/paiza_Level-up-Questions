<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$N, $M] = explode(" ", trim(fgets(STDIN)));
    $w = trim(fgets(STDIN));
    $MAX = 1500;
    for ($i =  1; $i <= $MAX; $i++) {
        $distance = abs($i - $w);
        if ($i % $N == 0) {
            echo "$i $distance\n";
        }
    }
?>