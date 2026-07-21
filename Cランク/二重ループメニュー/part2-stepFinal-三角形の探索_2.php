<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    $a = 0;
    $b = 0;
    $c = 0;
    $isSanheihou = false;
    
    // aを斜辺とする
    for ($a = 1; $a <= $N; $a++) {
        for ($b = 1; $b <= $N; $b++) {
            $c = $N - $a - $b;
            
            // 辺の長さは正、かつaが再長辺
            if ($c <= 0 || $c >= $a) {
                continue;
            }
            
            if ($a * $a == $b * $b + $c * $c) {
                $isSanheihou = true;
                break 2;
            }   
        }
    }
    
    if ($isSanheihou) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }
?>