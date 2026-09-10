<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    $answer = 0;
    while ($N > 0) {
        // 最下位ビットが1の時、カウントする
        if (($N & 1) == 1) {
            $answer++;
        }
        // 右ビットシフトして最下位ビットをずらす
        $N = $N >> 1;
    }
    echo "$answer\n";
?>