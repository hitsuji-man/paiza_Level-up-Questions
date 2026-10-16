<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $students = [];
    for ($i = 0; $i < $N; $i++) { 
        [$num, $id] = explode(" ", trim(fgets(STDIN)));
        $students[$num] = $id;
    }

    for ($i = 0; $i < $K; $i++) { 
        $line = explode(" ", trim(fgets(STDIN)));
        if ($line[0] === "join") {
            $students[$line[1]] = $line[2];
        } elseif ($line[0] === "leave") {
            unset($students[$line[1]]);
        } elseif ($line[0] === "call") {
            echo $students[$line[1]] . "\n";
        }
    }