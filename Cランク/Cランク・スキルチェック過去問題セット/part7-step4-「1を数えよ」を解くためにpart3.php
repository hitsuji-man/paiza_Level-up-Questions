<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    // 初期値を入れておく
    $remainder = $N;
    $numbers = [];
    $binaryDigits = [];
    while ($N > 0) {
        $remainder = $N % 2;
        $N = intdiv($N, 2);
        $numbers[] = $remainder;
    }
    $binaryDigits = array_reverse($numbers);
    $oneCount = count(array_keys($binaryDigits, 1));
    echo "$oneCount\n";
?>