<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $A = [];
    for ($i = 1; $i <= $N; $i++) { 
        $A[$i] = (int) trim(fgets(STDIN));
    }
    
    $separators = [];
    for ($i = 1; $i <= $K; $i++) { 
        $separators[] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    }
    // print_r($separators);
    $sum = 0;
    foreach ($separators as $array) {
        for ($i = $array[0]; $i <= $array[1]; $i++) { 
            $sum += $A[$i];
        }
        echo $sum . "\n";
        $sum = 0;
    }