<?php
    [$N, $X] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $w = [];
    for ($i = 0; $i < $N; $i++) { 
        $w[$i] = (int) trim(fgets(STDIN));
    }

    // $volumes = [];
    // $sum = 0;
    // for ($i = 0; $i < $N; $i++) { 
    //     for ($j = 0; $j < $N; $j++) { 
    //         // これだと先頭から順に足していってしまう
    //         // $sum += $w[($i + $j) % $N];
            
            
    //         // 合計について$Xを超えていないか判定する
    //         if ($sum <= $X) {
    //             $volumes[] = $sum;       
    //         }
    //     }
    //     $sum = 0;
    // }
    
    // $max = max($volumes);
    // echo $max . "\n";

    $sum = 0;
    $beforeList = [0];   // 検討前の配列
    $afterList = [];    // 検討後の配列

    for ($i = 0; $i < $N; $i++) { 
        // 今のコップを見送った場合の候補を残す
        $afterList = $beforeList;

        // 今のコップを入れた場合の候補を追加する
        foreach ($beforeList as $amount) {
            $sum = $amount + $w[$i];
            if ($sum <= $X) {
                $afterList[] = $sum;
            }
        }

        // 今回の結果を次のコップの検討に引き継ぐ
        $beforeList = $afterList;
    }

    echo max($afterList) . "\n";