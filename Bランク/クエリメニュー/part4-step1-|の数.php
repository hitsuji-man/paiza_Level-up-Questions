<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    // 累積和:1ページ目から各ページまでの'I'の合計を、予め記録しておく
    // $sum[$i]:1ページ目からiページ目までの'I'の合計
    $sum = [0];
    for ($i = 1; $i <= $N; $i++) { 
        $count = (int) trim(fgets(STDIN));
        $sum[$i] = $sum[$i - 1] + $count;
    }

    for ($i = 0; $i < $K; $i++) { 
        [$A_start, $A_end, $B_start, $B_end] = array_map(
            'intval',
            explode(" ", trim(fgets(STDIN)))
        );

        // 両端のページを含めて何ページ掴んだか
        $A_pages = $A_end - $A_start + 1;
        $B_pages = $B_end - $B_start + 1;

        // 反則負けの条件
        $A_foul = $A_pages * 3 >= $N;
        $B_foul = $B_pages * 3 >= $N;

        if ($A_foul && $B_foul) {
            echo "DRAW\n";
        } elseif ($A_foul) {
            echo "B\n";
        } elseif ($B_foul) {
            echo "A\n";
        } else {
            // 累積和を使って範囲内のページを毎回数え直さず、右端までの合計と左端の一つ前までの合計を見るだけで、'I'の数を求められる
            $A_total = $sum[$A_end] - $sum[$A_start - 1];
            $B_total = $sum[$B_end] - $sum[$B_start - 1];

            if ($A_total > $B_total) {
                echo "A\n";
            } elseif ($A_total < $B_total) {
                echo "B\n";
            } else {
                echo "DRAW\n";
            }
        }
    }