<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $A = trim(fgets(STDIN));
    $B = trim(fgets(STDIN));
    $C = trim(fgets(STDIN));
    
    echo implode("-", [$A, $B, $C]) . "\n";
?>