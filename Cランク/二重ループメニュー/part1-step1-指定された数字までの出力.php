<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = trim(fgets(STDIN));
    for ($i = 1; $i <= $input_line; $i++) {
        if ($i == $input_line) { 
            echo "$i\n"; 
        } else {
            echo "$i ";
        }
    }
?>