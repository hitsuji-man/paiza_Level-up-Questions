<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = trim(fgets(STDIN));
    $input_number = explode(" ", $input_line);
    $y = $input_number[0];
    $x = $input_number[1];
    $arrayA_2d = [];
    
    for ($i = 0; $i < $y; $i++) {
         $line = trim(fgets(STDIN));
         $arrayA_2d[$i] = array_map(
             "intval",
             explode(" ", $line)
        );
    }
    // print_r($arrayA_2d);
    
    $max = 0;
    for ($i = 0; $i < $y; $i++) {
         for ($j = 0; $j < $x; $j++) {
              if ($arrayA_2d[$i][$j] > $max) {
                  $max = $arrayA_2d[$i][$j];
              }
         }
    }
    echo "$max\n";
?>