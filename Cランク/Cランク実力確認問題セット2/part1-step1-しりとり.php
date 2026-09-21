<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$S, $T] = explode(" ", trim(fgets(STDIN)));
    $length = strlen($S);
    $last = $length - 1;
    if ($S[$last] == $T[0]) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }
?>