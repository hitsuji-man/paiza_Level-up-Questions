<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = trim(fgets(STDIN));
    $number_array = str_split($input_line);
    
    $sum1 = $number_array[0] + $number_array[3];
    $sum2 = $number_array[1] + $number_array[2];
    echo $sum1 . $sum2 . "\n";
    
?>