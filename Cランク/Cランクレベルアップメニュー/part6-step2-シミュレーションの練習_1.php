<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    // パイザ君は自分の番が来ると、自分のもっている数の a 倍を霧島京子の数に足してあげます。
    // 霧島京子は自分の番が来ると、自分のもっている数を b で割った余りをパイザ君の数に足してあげます。
    // 入力例1
    //     6
    //     3 2
    // 出力例1
    //     2
    $n = trim(fgets(STDIN));
    [$a, $b] = explode(" ", trim(fgets(STDIN)));
    $aNumber = 1;
    $bNumber = 1;
    $count = 0;
    // echo "$n\n$a $b\n";
    
    while ($bNumber <= $n) {
        $bNumber += $aNumber * $a;
        $count += 1;
        // 京子の数がnより大きくなったら終了
        if ($bNumber > $n) {
            break;
        }
        $aNumber += $bNumber % $b;
        // echo "$aNumber $bNumber\n";
    }
    echo $count . "\n";
?>