<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$N, $W] = explode(" ", trim(fgets(STDIN)));
    [$k1, $k2] = explode(" ", trim(fgets(STDIN)));
    $middle = ($k1 + $k2) / 2;
    $mikans = [];
    for ($i = 0; $i < $W; $i++) {
         $mikans[] = trim(fgets(STDIN));
    }
    foreach ($mikans as $mikan) {
        if ($mikan >= $middle) {
            echo "$k2\n";
        } else {
            echo "$k1\n";
        }
    }
?>