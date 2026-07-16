<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    /**
     * 2 3
     * 1 2 3
     * 4 5 6
     **/
    $input_line = trim(fgets(STDIN));
    $input_number = explode(" ", $input_line);
    $y = $input_number[0];
    $x = $input_number[1];
    
    $array = [];
    for ($i = 0; $i < $y; $i++) {
        $line = trim(fgets(STDIN));
        $array[$i] = array_map(
            "intval",
            explode(" ", $line)
        );
    }
    
    for ($i = 0; $i < $x; $i++) {
        for ($j = 0; $j < $y; $j++) {
            echo "{$array[$j][$i]}";
            if ($j < $y - 1) {
                echo " ";
            }
        }
        echo "\n";
    }
?>