<?php
    [$N, $X, $P] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $array = [];
    $array[] = $P;
    for ($i = 0; $i < $N; $i++) { 
        $array[] = (int) trim(fgets(STDIN));
    }
    $array[] = $X;
    sort($array);
    $max = $N + 2;
    $count = 1;
    for ($i = 0; $i < $max; $i++) { 
        if ($array[$i] === $P) {
            echo $count . "\n";
        }
        $count++;
    }
