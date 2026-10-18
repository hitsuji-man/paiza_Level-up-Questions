<?php
    [$N, $K] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $students = [];
    $member = [];
    for ($i = 0; $i < $N; $i++) { 
        $member[] = trim(fgets(STDIN));
    }

    for ($i = 0; $i < $K; $i++) { 
        [$Y, $C] = explode(" ", trim(fgets(STDIN)));
        // 同じ年に複数の名前を持つことがあるため、年ごとに名前の配列を持たせる
        $students[$Y][] = $C;
    }
    
    // 年を数値として昇順に並べる
    ksort($students);
    
    foreach ($students as $names) {
        // 同じ年の名前だけを辞書順に並べる
        sort($names, SORT_STRING);

        foreach ($names as $name) {
            echo $name . "\n";
        }
    }