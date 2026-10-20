<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $array = [];
    for ($i = 0; $i < $N; $i++) { 
        $array[] = (int) trim(fgets(STDIN));
    }
    $terminations = [];
    for ($i = 0; $i < $K; $i++) { 
        $terminations[] = (int) trim(fgets(STDIN));
    }
    print_r($terminations);
    $answer = 0;
    foreach ($terminations as $value) {
        for ($i = 0; $i < $value; $i++) { 
            $answer += $array[$i];
        }
        echo $answer . "\n";
        $answer = 0;
    }