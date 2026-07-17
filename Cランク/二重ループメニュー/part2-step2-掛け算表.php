<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    /**
     * 3
     * 56 37 30 
     **/
    $N = trim(fgets(STDIN));
    $input_line = trim(fgets(STDIN));
    $arrayA = explode(" ", $input_line);
    // print_r($arrayA);
    
    $arrayB = [];
    for ($i = 0; $i < $N; $i++) {
        for ($j = 0; $j < $N; $j++) {
            $arrayB[$i][$j] = $arrayA[$i] * $arrayA[$j];
            echo "{$arrayB[$i][$j]}";
            if ($j < $N - 1) {
                echo " ";
            }
        }
        echo "\n";
    }
?>