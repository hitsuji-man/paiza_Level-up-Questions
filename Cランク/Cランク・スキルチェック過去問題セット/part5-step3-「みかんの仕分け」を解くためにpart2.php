<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$N, $W] = explode(" ", trim(fgets(STDIN)));
    $mikans = [];
    for ($i = 0; $i < $W; $i++) {
         $mikans[] = trim(fgets(STDIN));
    }
    foreach ($mikans as $mikan) {
        if ($mikan % $N == 0) {
            echo "Yes\n";
        } else {
            echo "No\n";
        }
    }
?>