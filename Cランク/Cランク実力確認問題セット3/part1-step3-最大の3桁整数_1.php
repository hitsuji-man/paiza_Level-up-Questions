<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$A, $B, $C] = explode(" ", trim(fgets(STDIN)));
    $number = [];
    $number[] = (int)($A . $B . $C);
    $number[] = (int)($A . $C . $B);
    $number[] = (int)($B . $A . $C);
    $number[] = (int)($B . $C . $A);
    $number[] = (int)($C . $A . $B);
    $number[] = (int)($C . $B . $A);
    $max = max($number);
    echo "$max\n";
?>