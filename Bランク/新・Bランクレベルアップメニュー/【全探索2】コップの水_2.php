<?php
    [$N, $X] = array_map('intval', explode(' ', trim(fgets(STDIN))));

    // 添え字 0 から $X までを false で初期化する
    // $dp[$j] が true なら、検討済みのコップの組み合わせで $j ml作れる
    $dp = array_fill(0, $X + 1, false);
    $dp[0] = true;

    for ($i = 0; $i < $N; $i++) {
        $water = (int) trim(fgets(STDIN));

        // $jを大きい方から更新することで、参照する$dp[$j-$water]は今のコップを検討する前の値のまま
        // このDPで確認しているのは、各水量について、それを作れる組み合わせが1つでもあるか
        for ($j = $X; $j >= $water; $j--) {
            /**
             * 目標の水量にするには、今のコップを入れる前に何ml必要か
             * 目標の $j mlから今のコップの水量を引き、残りを作れるか確認する
             * 例として、82ml を処理中に $j = 82 の時、$dp[82-82] = $dp[0]がtrueになるので、$dp[82]をtrueにする
             * 次の 52ml の処理中に j = 134 の時、$dp[134-52]=$dp[82]を読む。前のコップの処理でtrueになっているので、$dp[134]をtrueにする
             * 
             * 見送る場合: 以前のtrueを消さない。ifの外で何かする必要はない
             * 入れる場合: ifの条件
             */
            if ($dp[$j - $water]) {
                $dp[$j] = true;
            }
        }
    }

    for ($j = $X; $j >= 0; $j--) {
        if ($dp[$j]) {
            echo $j . "\n";
            break;
        }
    }