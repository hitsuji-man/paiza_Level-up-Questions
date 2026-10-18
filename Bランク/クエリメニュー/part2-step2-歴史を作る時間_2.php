<?php
    [$N ,$K] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $member = [];
    for ($i = 0; $i < $N; $i++) { 
        $member[] = trim(fgets(STDIN));
    }

    // [年, 名前]を1件ずつ保存し、年→名前の優先順でソートする
    $histories = [];
    for ($i = 0; $i < $K; $i++) { 
        [$year, $name] = explode(" ", trim(fgets(STDIN)));
        $histories[] = [(int)$year, $name];
    }

    usort($histories, function($a, $b) {
        // 年が異なる場合: <=>で年の大小を比較する
        // 年が同じ場合: 比較結果が0なので、strcmp()で名前を比較する
        // ?: は、左側が真と評価されればその値を使い、偽と評価されれば右側の値を使う演算子(PHPでは 0は偽, -1と1は真)
        return ($a[0] <=> $b[0]) ?: strcmp($a[1], $b[1]);
    });

    foreach ($histories as [$year, $name]) {
        echo $name . "\n";
    }