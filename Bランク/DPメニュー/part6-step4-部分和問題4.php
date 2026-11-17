<?php
    [$n, $x] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $dp = array_fill(0, $x + 1, false);
    // $dp[$sum]: 重さの合計を$sumにできるか
    $dp[0] = true;  // 重りを使わずに作れる0だけをtrueにする

    for ($i = 0; $i < $n; $i++) { 
        $weight = (int) trim(fgets(STDIN));

        // 各重りについて合計を小さい順に調べると、同じ重りで直前に作った合計も使用できる
        for ($sum=0; $sum <= $x; $sum++) {
            // 今の重りを1個足す前の合計を作れるなら、$sumも作れる
            if ($dp[$sum - $weight]) {
                // 作れるなら今の重りを足して、合計$sumにできる
                $dp[$sum] = true;
            }
        }
    }

    echo $dp[$x] ? "yes\n" : "no\n";