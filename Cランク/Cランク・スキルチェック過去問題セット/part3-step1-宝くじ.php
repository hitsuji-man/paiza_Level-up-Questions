<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $winningNumber = trim(fgets(STDIN));
    $N = trim(fgets(STDIN));
    $numbers = [];
    for ($i = 0; $i < $N; $i++) {
        $numbers[$i] = (int)trim(fgets(STDIN));
    }
    // echo "$winningNumber\n";
    // echo "$N\n";
    // print_r($numbers);
    
    $winningFourNum = substr(str_pad($winningNumber, 4, '0', STR_PAD_LEFT), -4);
    // echo "$winningFourNum\n";
    $winningThreeNum = substr(str_pad($winningNumber, 3, '0', STR_PAD_LEFT), -3);
    // echo "$winningThreeNum\n";
    
    $lastFourDigits = array_map(
        // 007 のような先頭のゼロを保持する場合は文字列で取得
        fn($number) => substr(str_pad($number, 4, '0', STR_PAD_LEFT), -4),
        $numbers
    );
    // print_r($lastFourDigits);
    $lastThreeDigits = array_map(
        fn($number) => substr(str_pad($number, 3, '0', STR_PAD_LEFT), -3),
        $numbers
    );
    // print_r($lastThreeDigits);
    
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