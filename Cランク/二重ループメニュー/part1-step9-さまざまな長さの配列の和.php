<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = trim(fgets(STDIN));
    
    $arrayA_2d = [];
    $sums_y = [];
    for ($i = 0; $i < $input_line; $i++) {
         $line = trim(fgets(STDIN));
         $input_number = explode(" ", $line);
         $x = $input_number[0];
         for ($j = 1; $j <= $x; $j++) {
              $arrayA_2d[$i][$j] = $input_number[$j];
              $sums_y[$i] += $input_number[$j]; 
         }
    }
    // print_r($arrayA_2d);
    // print_r($sums_y);
    foreach ($sums_y as $sum_y) {
        echo "$sum_y\n";
    }
?>