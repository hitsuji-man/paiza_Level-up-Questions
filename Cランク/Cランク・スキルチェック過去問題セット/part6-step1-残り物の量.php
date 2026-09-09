<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$m, $p, $q] = explode(" ", trim(fgets(STDIN)));
    $amount1 = $m - $m * ($p/100); 
    $amount2 = $amount1 - $amount1 * ($q/100);
    echo "$amount2\n";
?>