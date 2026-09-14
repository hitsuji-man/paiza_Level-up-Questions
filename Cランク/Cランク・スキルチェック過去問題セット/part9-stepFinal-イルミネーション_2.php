<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$N, $M] = explode(" ", trim(fgets(STDIN)));
    $light = [];
    $a = 1;
    $b = 0;
    $total = 0;
    for ($i = 0; $i < $M; $i++) { 
        [$a, $b] = array_map('intval', explode(" ", trim(fgets(STDIN))));
        $light[$a] = $b;

        // 1〜N までのすべてのキーが揃ったら、かつ配列の最小値が正ならループを終了
        if (count($light) == $N && min($light) > 0) {
            break;
        }
    }
    // ksort($light);
    // print_r($light);
    $total = array_sum($light);
    echo "$total\n"
?>