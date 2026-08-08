<?php

    $n = trim(fgets(STDIN));
    $dmg = [];
    
    for ($i = 0; $i < $n; $i++) { 
        $s = trim(fgets(STDIN));
        // 人名の連想配列を0で初期化
        $dmg[$s] = 0;
    }
    
    $m = trim(fgets(STDIN));
    for ($i = 0; $i < $m; $i++) { 
        [$p, $a] = explode(" ", trim(fgets(STDIN)));
        $dmg[$p] += $a;
    }
    // print_r($dmg);
    // 連想配列のキーの文字列を昇順(辞書順)でソート
    ksort($dmg);
    // print_r($dmg);
    
    // 要素を一つずつ取り出して出力
    foreach ($dmg as $point) {
        echo $point . "\n";
    }
?>