<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    $input_line = trim(fgets(STDIN));
    $input_number = explode(" ", $input_line);
    
    for ($i = 0; $i < $n; $i++) {
        echo "$input_number[$i]\n";
    }
?>