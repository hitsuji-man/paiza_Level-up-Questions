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
    
    // 二次元配列内に1があるか検索
    for ($i = 0; $i < $y; $i++) {
         for ($j = 0; $j < $x; $j++) {
              if ($arrayA_2d[$i][$j] == 1) {
                  $y_gyo = $i + 1;
                  $x_retsu = $j + 1;
                  echo "$y_gyo $x_retsu\n";
              }
         }
    }
?>