<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$N, $K, $S] = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $alphabetes = [];
    for ($i = 1; $i <= $N; $i++) {
        $alphabetes[$i] = explode(" ", trim(fgets(STDIN)));
    }
    // print_r($alphabetes);
    $directions = [];
    for ($i = 0; $i < $K; $i++) {
        $directions[] = trim(fgets(STDIN));
    }
    // print_r($directions);
    
    $strings = [];
    $strings[0] = $alphabetes[$S][0];
    for ($i = 0; $i < $K; $i++) {
        $position = $directions[$i];
        if ($i == 0) {
            $next = $alphabetes[$S][$position];
        } else {
            $next = $alphabetes[$next][$position];
        }
        
        $strings[] = $alphabetes[$next][0];
    }
    foreach ($strings as $string) {
        echo $string;
    }
    echo "\n";
?>