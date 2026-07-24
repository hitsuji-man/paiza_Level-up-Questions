<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    // 1. 持っている銀が多い方が財産が多い。
    // 2. 持っている銀が同じなら、持っている金が多い方が財産が多い。
    // N
    // g_1 s_1
    // ...
    // g_N s_N
    // 金の量 g_i と銀の量 s_i
    $N = fgets(STDIN);
    $gs = [];
    for ($i = 0; $i < $N; $i++) {
        [$g, $s] = explode(' ', trim(fgets(STDIN)));
        $gs[] = [$g, $s];
    }
    // print_r($gs);
    
    for ($i = 0; $i < $N - 1; $i++) {
        // $iより右側だけを調べる(最後の右端の要素($N-1)は比較する要素がないため$N-2まで)
         for ($j = $i + 1; $j < $N; $j++) {
            // $gs[$i]と$gs[$j]を比較する
            $shouldSwap = false;
              
            // 持っている銀が少ない場合 
            if ($gs[$i][1] < $gs[$j][1]) {
                $shouldSwap = true;
            }
            
            // 銀が同じで、持っている金が少ない場合
            if ($gs[$i][1] === $gs[$j][1] && $gs[$i][0] < $gs[$j][0]) {
                $shouldSwap = true;
            }
            
            if ($shouldSwap) {
                $temp = $gs[$i];
                $gs[$i] = $gs[$j];
                $gs[$j] = $temp;
            }
         }
    }
    
    for ($i = 0; $i < $N; $i++) {
         echo $gs[$i][0] . " " . $gs[$i][1] . "\n";
    }
?>