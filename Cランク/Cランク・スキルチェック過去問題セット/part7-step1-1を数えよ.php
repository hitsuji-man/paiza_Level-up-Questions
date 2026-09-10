<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    // 余りに初期値を入れておく
    $remainder = $N;
    $numbers = [];
    $binaryDigits = [];
    while ($N > 0) {
        // 2進数へ変換するなら、「余りを保存したあと、元の数を2で割る」必要がある
        $remainder = $N % 2;
        $N = intdiv($N, 2);
        // echo "元の数: $N\n";
        $numbers[] = $remainder;
    }
    // 2進数に変換するには最後に逆順にソートする必要がある
    $binaryDigits = array_reverse($numbers);
    // print_r($binaryDigits);
    $oneCount = count(array_keys($binaryDigits, 1));
    echo "$oneCount\n";
?>