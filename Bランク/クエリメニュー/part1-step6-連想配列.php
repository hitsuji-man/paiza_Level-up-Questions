<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $students = [];
    for ($i = 0; $i < $N; $i++) { 
        [$num, $id] = explode(" ", trim(fgets(STDIN)));
        $students[$num] = $id;
    }

    for ($i = 0; $i < $K; $i++) { 
        $Q = (int) trim(fgets(STDIN));
        echo $students[$Q] . "\n";
    }