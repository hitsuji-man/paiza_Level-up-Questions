<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    // 0 以上 2 未満であれば "clear"、 2 以上 9 未満であれば "sunny"、 9 以上 10 以下であれば "cloudy" 
    if (0 <= $N && $N < 2) {
        echo "clear\n";
    } elseif (2 <= $N && $N < 9) {
        echo "sunny\n";
    } else {
        echo "cloudy\n";
    }
?>