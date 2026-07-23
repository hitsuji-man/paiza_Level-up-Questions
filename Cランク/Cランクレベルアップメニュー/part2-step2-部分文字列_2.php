<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $a = trim(fgets(STDIN));
    $S = trim(fgets(STDIN));
    
    if (strpos($S, $a) !== false) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }
?>