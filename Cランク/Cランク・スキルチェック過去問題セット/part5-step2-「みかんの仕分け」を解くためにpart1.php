<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$N, $W] = explode(" ", trim(fgets(STDIN)));
    $mikans = [];
    for ($i = 0; $i < $W; $i++) {
         $mikans[] = trim(fgets(STDIN));
    }
    echo "$N $W\n";
    foreach ($mikans as $mikan) {
        echo "$mikan\n";
    }  
?>