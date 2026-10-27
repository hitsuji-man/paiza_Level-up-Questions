<?php
    $K = (int) trim(fgets(STDIN));
    $A = [];
    for ($i = 0; $i < 10000; $i++) { 
        $A[] = (int) trim(fgets(STDIN));
    }
    
    for ($i = 0; $i < $K; $i++) { 
        [$l, $k] = array_map('intval', explode(" " ,trim(fgets(STDIN))));
        // 配列の一部分を取り出す
        $length = $k - $l + 1;      // 取り出す個数
        $part = array_slice($A, $l - 1, $length);
        $max = max($part);
        echo $max . "\n";
    }