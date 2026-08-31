<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $winningNumber = trim(fgets(STDIN));
    $N = trim(fgets(STDIN));
    $numbers = [];
    for ($i = 0; $i < $N; $i++) {
        $numbers[$i] = (int) trim(fgets(STDIN));
    }
    
    $lastFourDigits = array_map(
        // 下4桁の取得:数字の先頭の0埋めはしない
        fn($number) => (int) $number % 10000,
        $numbers
    );
    
    foreach ($lastFourDigits as $num) {
        echo "$num\n";
    }
?>