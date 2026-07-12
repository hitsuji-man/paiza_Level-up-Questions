<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = fgets(STDIN);
    $input_number = explode(" ", $input_line);
    $array_y = $input_number[0];
    $array_x = $input_number[1];
    // echo "y: $array_y, x: $array_x\n";
    
    for($i = 0; $i < $array_y; $i++) {
        $s = trim(fgets(STDIN));
        $s = str_replace(array("\r\n","\r","\n"), '', $s);
        $s = explode(" ", $s);
        for($j=0; $j < $array_x; $j++){
            // print_r($s);
            // echo "$s[0] $s[1] $s[2] $s[3]\n";
            if ($j == $array_x -1 ) {
                echo "$s[$j]\n";
            } else {
                echo "$s[$j] ";
            }
        }
    }
?>