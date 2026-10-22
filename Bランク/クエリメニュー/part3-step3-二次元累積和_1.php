<?php
    [$H, $W, $N] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $A = [];
    for ($i = 1; $i <= $H; $i++) { 
        $row = array_map('intval', explode(" ", trim(fgets(STDIN))));
        // 列のインデックスが1からになるための処理
        array_unshift($row, 0);     // 添え字0にダミーを追加
        unset($row[0]);             // 先頭のダミー要素を削除
        $A[$i] = $row;
    }

    $sum = 0;
    for ($i = 0; $i < $N; $i++) { 
        [$y, $x] = explode(" ", trim(fgets(STDIN)));
        for ($j = 1; $j <= $y; $j++) { 
            for ($k = 1; $k <= $x; $k++) { 
                $sum += $A[$j][$k];
            }
        }
        echo $sum . "\n";
        $sum = 0;
    }