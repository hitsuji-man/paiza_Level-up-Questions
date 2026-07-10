<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = trim(fgets(STDIN));
    $input_number = explode(" ", $input_line);
    $max = $input_number[0];
    $line = $input_number[1];
    
    for ($i = 1; $i <= $line; $i++) {
        for ($j = 1; $j <= $max; $j++) {
             if ($j == $max) { 
                 echo "$j\n"; 
             } else {
                 echo "$j ";
             }
        }
    }
?>