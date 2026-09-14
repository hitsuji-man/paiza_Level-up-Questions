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

        // 1〜N までのすべてのキーが揃ったら、かつ値に0が含まれていなかったらループを終了
        if (count($light) == $N &&  !in_array(0, $light, true)) {
            break;
        }
    }
    // ksort($light);
    // print_r($light);
    $total = array_sum($light);
    echo "$total\n"
?>