<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $A = [];
    for ($i = 1; $i <= $N; $i++) { 
        $A[$i] = (int) trim(fgets(STDIN));
    }

    for ($i = 0; $i < $K; $i++) { 
        [$A_start, $A_end, $B_start, $B_end] = array_map('intval', explode(" ", trim(fgets(STDIN))));
        
        // 掴んだページの両端の番号を確認するだけで、掴んだ範囲のページに含まれる'|'の合計数を求められる
    }