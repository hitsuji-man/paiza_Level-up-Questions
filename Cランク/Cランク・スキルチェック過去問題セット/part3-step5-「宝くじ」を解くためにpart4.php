<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $winningNumber = trim(fgets(STDIN));
    $N = trim(fgets(STDIN));
    $numbers = [];
    for ($i = 0; $i < $N; $i++) {
         $numbers[] = trim(fgets(STDIN));
         if ($numbers[$i] == $winningNumber) {
            echo "first\n";
         } elseif ($numbers[$i] == $winningNumber - 1 || $numbers[$i] == $winningNumber + 1) {
            echo "adjacent\n";
         } else {
            echo "blank\n";
         }
    }
?>