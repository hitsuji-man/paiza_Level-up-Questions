<?php
// 自分の得意な言語で
    // Let's チャレンジ！！
    // パイザ君は自分の番が来ると、自分のもっている数の a 倍を霧島京子の数に足してあげます。
    // 霧島京子は自分の番が来ると、自分のもっている数を b で割った余りをパイザ君の数に足してあげます。
    $n = trim(fgets(STDIN));
    [$a, $b] = explode(" ", trim(fgets(STDIN)));

    $paiza = 1;
    $kyoko = 1;
    $count = 0;

    while ($kyoko <=$n) {
        $kyoko += $paiza * $a;
        $count += 1;
        if ($kyoko > $n) {
            break;
        }
        $paiza += $kyoko % $b;
    }
    echo $count . "\n";