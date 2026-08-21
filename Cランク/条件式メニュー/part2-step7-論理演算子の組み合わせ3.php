<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$A, $B, $C, $D] = explode(" ", trim(fgets(STDIN)));
    if (($A == $B || $C == $D) && $A == $C) {
        echo "1\n";
    } else {
        echo "0\n";
    }  
?>