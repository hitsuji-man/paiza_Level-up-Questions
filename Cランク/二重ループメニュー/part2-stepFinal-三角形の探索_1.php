<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    // タイムオーバーでN=999付近で失敗
    $N = trim(fgets(STDIN));
    $a = 0;
    $b = 0;
    $c = 0;
    // $isSanheihou = false;
    $result = [];
    
    for ($a = 1; $a <= $N; $a++) {
        for ($b = 1; $b <= $N; $b++) {
            for ($c = 1; $c <= $N; $c++) {
                if ($a + $b + $c == $N) {
                    if ($a * $a == $b * $b + $c * $c) {
                        $result[$a][$b][$c] = "YES";
                    } else {
                        $result[$a][$b][$c] = "NO";
                    }
                }
            }
        }
    }
    $hasTrue = false;
    
    array_walk_recursive($result, function ($value) use (&$hasTrue) {
        // "YES" が含まれていれば true に変更（大文字小文字を区別しない比較）
        if (in_array(strtoupper($value), ['YES'], true)) {
            $hasTrue = true;
    }
    });
    
    if ($hasTrue) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }
?>