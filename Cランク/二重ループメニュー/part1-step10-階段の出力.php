<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = fgets(STDIN);
    for ($i = 1; $i <= $input_line; $i++) {
         for ($j = 1; $j <= $i; $j++) {
            if ($j == $i) {
              echo "$j\n";
            } else {
              echo "$j ";
            }
         }
         
    }
?>