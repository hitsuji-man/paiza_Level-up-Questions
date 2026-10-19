<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $departments = [];
    for ($i = 0; $i < $N; $i++) { 
        $name = trim(fgets(STDIN));
        $departments[$name] = [];
    }

    for ($i = 0; $i < $K; $i++) { 
        [$name, $orderNum, $amount] = explode(" ", trim(fgets(STDIN)));
        $departments[$name][] = [$orderNum, (int) $amount];
    }
    
    foreach ($departments as $keyString => $arrays) {
        echo $keyString . "\n";
        foreach ($arrays as $array) {
            // implode:配列要素を指定した区切り文字で繋ぎ、1つの文字列にする
            echo implode(" ", $array) . "\n";
        }
        echo "-----\n";
    }