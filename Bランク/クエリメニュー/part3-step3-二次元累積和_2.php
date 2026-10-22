<?php
    [$H, $W, $N] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // 0行0列目を0にしておく
    // 第二引数は添え字0を含めての要素数(0~$H)なため+1しておく
    $sum = array_fill(0, $H + 1, array_fill(0, $W + 1, 0));

    for ($y = 1; $y <= $H; $y++) { 
        $row = array_map('intval', explode(" ", trim(fgets(STDIN))));

        // 二次元累積和
        // $sum[$y][$x]は左上から(y, x)までの合計
        // 現在の値 + 上までの累積和 + 左までの累積和 - 重複した左上の累積和
        // S(i,j) = S(i-1,j) + S(i,j-1) - S(i-1,j-1) + A[i][j]
        for ($x = 1; $x <= $W; $x++) { 
            $sum[$y][$x] = $row[$x - 1]
                + $sum[$y - 1][$x]
                + $sum[$y][$x - 1]
                - $sum[$y - 1][$x - 1];
        }
    }

    for ($i = 0; $i < $N; $i++) { 
        [$y, $x] = array_map('intval', explode(" ", trim(fgets(STDIN))));
        echo $sum[$y][$x] . "\n";
    }