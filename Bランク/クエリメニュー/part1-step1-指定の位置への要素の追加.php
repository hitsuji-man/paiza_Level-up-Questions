<?php
    [$N, $K, $Q] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $array = [];
    for ($i = 0; $i < $N; $i++) { 
        $array[] = trim(fgets(STDIN));
    }
    // インデックス$K(K+1番目)の位置に$Qを挿入
    array_splice($array, $K, 0, [$Q]);

    foreach ($array as $item) {
        echo $item . "\n";
    }