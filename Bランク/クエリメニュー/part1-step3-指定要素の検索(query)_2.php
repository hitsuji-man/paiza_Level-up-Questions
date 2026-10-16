<?php
    // 最初に「値が存在するか」を調べるための連想配列を作っておく
    [$N, $Q] = array_map('intval', explode(" ", trim(fgets(STDIN))));

    $exists = [];
    for ($i = 0; $i < $N; $i++) { 
        $a = (int) trim(fgets(STDIN));
        $exists[$a] = true;
    }

    for ($i = 0; $i < $Q; $i++) { 
        $k = (int) trim(fgets(STDIN));
        echo isset($exists[$k]) ? "YES\n" : "NO\n";
    }