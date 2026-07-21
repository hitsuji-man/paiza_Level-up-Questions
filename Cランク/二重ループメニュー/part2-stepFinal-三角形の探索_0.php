<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    // タイムオーバーでN=999,1000のみで失敗
    $N = trim(fgets(STDIN));
    $a = 0;
    $b = 0;
    $c = 0;
    $isSanheihou = false;
    
    for ($a = 1; $a <= $N; $a++) {
        for ($b = 1; $b <= $N; $b++) {
            for ($c = 1; $c <= $N; $c++) {
                if ($a + $b + $c == $N) {
                    if ($a * $a == $b * $b + $c * $c) {
                        $isSanheihou = true;
                        break 3;
                    } else {
                        $isSanheihou = false;
                    }
                }
            }
        }
    }
    
    if ($isSanheihou) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }
?>