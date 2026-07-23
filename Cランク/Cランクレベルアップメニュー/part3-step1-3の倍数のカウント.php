<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    $input_number = explode(" ", trim(fgets(STDIN)));
    $count = 0;
    for ($i = 0; $i < $n; $i++) {
        if ($input_number[$i] % 3 == 0) {
            $count += 1;
        }
    }
    echo "$count\n";
?>