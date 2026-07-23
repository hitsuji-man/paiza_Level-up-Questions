<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    $array = [];
    for ($i = 0; $i < $n; $i++) {
        $array[] = trim(fgets(STDIN));
    }
    $amount = trim(fgets(STDIN));
    // print_r($array);
    // print($amount);
    
    for ($i = 0; $i < count($array); $i++) {
         if ($array[$i] == $amount) {
            $winning_number = $i + 1;
            echo "$winning_number\n";
            break;
         }
    }
?>