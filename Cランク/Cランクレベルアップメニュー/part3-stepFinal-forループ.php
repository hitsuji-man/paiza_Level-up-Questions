<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_number = explode(" ", trim(fgets(STDIN)));
    $N_ninzuu = $input_number[0];
    $M_kosuu = $input_number[1];
    $K_point = $input_number[2];
    $array_select_number = [];
    
    for ($i = 0; $i < $N_ninzuu; $i++) {
        // 以下array_mapと同じ
        // $array_select_number[] = trim(fgets(STDIN));
        // $array_select_number[$i] = explode(" ", $array_select_number[$i]);
        $array_select_number[$i] = array_map(
            'intval',
            explode(' ', trim(fgets(STDIN)))
        );
    }
    // print_r($array_select_number);
    
    $count = 0;
    for ($i = 0; $i < $N_ninzuu; $i++) {
         for ($j = 0; $j < $M_kosuu; $j++) {
              if ($array_select_number[$i][$j] == $K_point) {
                $count += 1;  
              }
         }
         echo "$count\n";
         $count = 0;
    }
?>