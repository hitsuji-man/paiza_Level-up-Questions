<?php
    [$n, $x] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    for ($i = 1; $i <= $n; $i++) { 
        $a[$i] = (int) trim(fgets(STDIN));
    }

    for ($i = 0; $i <= $x; $i++) { 
        $dp[$i] = false;
    }

    $dp[0] = true;  // おもりを選ばなければ、重さの和を0とすることができる

    for ($i = 1; $i <= $n; $i++) {  // おもり i までのおもりを使って
        for ($j= $x; $j >= $a[$i]; $j--) {  // 重さの和を j とすることができるか($jは$xから減らすため、条件は $j >= $a[$i])
            // 今のおもりを足す前に必要な重さを、前のおもりだけで作れるか
            if ($dp[$j - $a[$i]]) {
                // 作れるなら、今のおもりを足して合計 j にできる
                $dp[$j] = true;
            }
        }
    }

    if ($dp[$x]) {
        echo "yes\n";
    } else {
        echo "no\n";
    }