<?php
    [$H, $W, $N] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // 0行目・0列目は0にする(要素数:0から始めて$W+1個)
    $sum = [array_fill(0, $W + 1, 0)];
    
    for ($y = 1; $y <= $H; $y++) { 
        $row = array_map('intval', explode(" ", trim(fgets(STDIN))));
        $sum[$y] = [0];

        for ($x = 1; $x <= $W; $x++) { 
            // 現在の値 + 上までの累積和 + 左までの累積和 - 重複した左上の累積和
            $sum[$y][$x] = 
                // $rowの添字は0から、$xの添字は1から始まるため、1を引く
                $row[$x - 1]
                + $sum[$y - 1][$x]
                + $sum[$y][$x - 1]
                - $sum[$y - 1][$x - 1];
        }
    }

    $answer = 0;
    for ($i = 0; $i < $N; $i++) { 
        [$a, $b, $c, $d] = array_map('intval', explode(" ", trim(fgets(STDIN))));

        // 区間和
        // 左上から(c, d)までの合計 − 対象より上の部分 − 対象より左の部分 ＋ 二重に引いた左上の部分
        $answer =
            $sum[$c][$d]
            - $sum[$a - 1][$d]
            - $sum[$c][$b - 1]
            + $sum[$a - 1][$b - 1];
        
        echo $answer . "\n";
    }