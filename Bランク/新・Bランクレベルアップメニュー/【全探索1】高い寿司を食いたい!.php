<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $P = [];
    for ($i = 0; $i < $N; $i++) { 
        $P[$i] = (int) trim(fgets(STDIN));
    }

    $prices = [];
    $sum = 0;
    for ($i = 0; $i < $N; $i++) { 
        for ($j = 0; $j < $K; $j++) { 
            // 開始位置 $i から $j 枚先の皿の価格を合計に加える。
            // % $N を使うと、レーンの最後を越えたとき(=$Nの時)に添字が 0 から続く。
            $sum += $P[(($i + $j) % $N)];   
        }
        $prices[] = $sum;
        $sum = 0;
    }

    $max = max($prices);
    echo $max . "\n";