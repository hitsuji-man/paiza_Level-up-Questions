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
    
    for ($i = 0; $i < $N; $i++) { 
        [$a, $b, $c, $d] = array_map('intval', explode(" ", trim(fgets(STDIN))));

        $sum = 0;
        for ($y= $a; $y <= $c; $y++) { 
            for ($x = $b; $x <= $d; $x++) { 
                $sum += $A[$y][$x];
            }
        }
        echo $sum . "\n";
    }