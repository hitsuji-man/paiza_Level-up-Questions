<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = fgets(STDIN);
    $time_array = explode(":", $input_line);
    $hour = str_split($time_array[0]);
    $minutes = str_split(trim($time_array[1]));  // 末尾に改行が含まれているため除く
    // print_r($hour);
    // print_r($minutes);
    
    if ($hour[0] == 0) {
        echo "$hour[1]\n";
    } else {
        echo $hour[0] . $hour[1] . "\n";
    }
    
    if ($minutes[0] == 0) {
        echo "$minutes[1]\n";
    } else {
        echo $minutes[0] . $minutes[1] . "\n";
    }
?>