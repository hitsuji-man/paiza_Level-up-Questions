<?php
    [$N, $K] = explode(" ", trim(fgets(STDIN)));
    $array = [];
    for ($i = 0; $i < $N; $i++) { 
        $array[] = trim(fgets(STDIN));
    }
    if (in_array($K, $array, true)) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }