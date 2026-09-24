<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$N, $M] = explode(" ", trim(fgets(STDIN)));
    $names = [];
    for ($i = 0; $i < $N; $i++) {
        $names[] = trim(fgets(STDIN));
    }
    
    $job = [];
    $key = 0;
    for ($i = 0; $i < $M; $i++) {
        // 名前は＄N個あるので$N回ごとに繰り返す($N=4の場合)
        // $i.  : 0 1 2 3 4 5 6 7 8
        // $key : 0 1 2 3 0 1 2 3 0
        if ($i % $N == 0) {
            $key = 0;
        }
        $name = $names[$key];
        $job[$i] = $name;
        $key++;
    }
    $index_M = $M - 1;
    echo "$job[$index_M]\n";
    // print_r($job);
?>