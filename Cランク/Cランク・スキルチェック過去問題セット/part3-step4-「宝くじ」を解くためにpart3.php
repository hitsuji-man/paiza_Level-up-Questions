<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $winningNumber = trim(fgets(STDIN));
    
    if ($winningNumber == 100000) {
        $plus = $winningNumber + 1;
        echo "$plus\n";
    } elseif ($winningNumber == 199999  ) {
        $minus = $winningNumber - 1;
        echo "$minus\n";
    } else {
        $plus = $winningNumber + 1;
        $minus = $winningNumber - 1;
        echo "$minus $plus\n";
    }
?>