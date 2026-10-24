<?php
    $A = [];
    for ($i = 1; $i <= 10000; $i++) { 
        $A[$i] = (int) trim(fgets(STDIN));
    }
    
    // 100要素ずつに分割(元のキーを保持する)
    $chunks = array_chunk($A, 100, true);
    // 100ずつの要素の最大値を出力する
    for ($i = 0; $i < 100; $i++) { 
        $max = max($chunks[$i]);
        echo $max . "\n";
    }