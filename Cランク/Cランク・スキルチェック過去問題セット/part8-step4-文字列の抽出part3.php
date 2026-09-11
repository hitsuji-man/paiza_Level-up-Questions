<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    [$tag_start, $tag_end] = explode(" ", trim(fgets(STDIN)));
    $S = trim(fgets(STDIN));
    $start_tag = "<";
    $index = [];
    for ($i = 0; $i < mb_strlen($S); $i++) {
         if ($S[$i] == $start_tag) {
             $index[] = $i + 1;
         }
    }
    echo "$index[0] $index[1]\n";  
?>