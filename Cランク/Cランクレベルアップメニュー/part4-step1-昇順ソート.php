<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    $array = [];
    for ($i = 0; $i < $n; $i++) {
        $array[] = trim(fgets(STDIN));
    }
    sort($array);
    foreach ($array as $value) {
        echo "$value\n";
    }
?>