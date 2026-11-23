<?php
    $n = (int) trim(fgets(STDIN));

    $times = [];
    $ys = [];
    $xs = [];

    // 入力値を受け取る
    for ($j = 1; $j <= $n; $j++) {
        [$time, $y, $x] = explode(' ', trim(fgets(STDIN)));

        $times[$j] = (int) $time;
        $ys[$j] = (int) $y;
        $xs[$j] = (int) $x;
    }

    $i = 1;

    for ($t = 0; $t <= 100 ; $t++) { 
        if ($t > $times[$i + 1]) {  // 時刻tが右端を超えているか
            $i += 1;                // 次の区間へ
        }

        $duration = $times[$i + 1] - $times[$i];    // 区間の長さ
        $elapsed = $t - $times[$i];                 // 経過時間

        // 座標の式を通分し、最後まで整数のまま計算する
        // 出発座標 + (到着座標 - 出発座標) × 経過時間 ÷ 区間の長さ
        // = (出発座標 × 区間の長さ + (到着座標 - 出発座標) × 経過時間) ÷ 区間の長さ
        $yNumerator = $ys[$i] * $duration + ($ys[$i + 1] - $ys[$i]) * $elapsed;
        $xNumerator = $xs[$i] * $duration + ($xs[$i + 1] - $xs[$i]) * $elapsed;

        $y = intdiv($yNumerator, $duration);
        $x = intdiv($xNumerator, $duration);

        // intdivの結果をfloorと同じにするため、商から-1する
        if ($yNumerator % $duration < 0) {
            $y--;
        }
        if ($xNumerator % $duration < 0) {
            $x--;
        }
        
        echo "$y $x\n"; 
    }