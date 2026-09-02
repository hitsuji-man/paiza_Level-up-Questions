<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $winningNumber = trim(fgets(STDIN));
    $N = trim(fgets(STDIN));
    $numbers = [];
    for ($i = 0; $i < $N; $i++) {
        $numbers[$i] = (int) trim(fgets(STDIN));
    }
    
    $winningFourNum = $winningNumber % 10000;
    $winningThreeNum = $winningNumber % 1000;
    
    $lastFourDigits = array_map(
        // 下4桁の取得:数字の先頭の0埋めはしない
        fn($number) => (int) $number % 10000,
        $numbers
    );
    $lastThreeDigits = array_map(
        fn($number) => (int) $number % 1000,
        $numbers
    );
    
    foreach ($numbers as $i => $number) {
        if ($number == $winningNumber) {
            echo "first\n";
        } elseif ($number == $winningNumber - 1 || $number == $winningNumber + 1) {
            echo "adjacent\n";
        } elseif ($lastFourDigits[$i] == $winningFourNum) {
            echo "second\n";
        } elseif ($lastThreeDigits[$i] == $winningThreeNum) {
            echo "third\n";
        } else {
            echo "blank\n";
        }
    }
?>