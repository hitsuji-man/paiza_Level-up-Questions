<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_words = explode(" ", trim(fgets(STDIN)));
    $wordsCounts = [];
    foreach ($input_words as $word) {
        if (isset($wordsCounts[$word])) {
            $wordsCounts[$word]++;
        } else {
            $wordsCounts[$word] = 1;
        }
    }
    
    foreach ($wordsCounts as $word => $count) {
        echo "$word\n";
    }
    foreach ($wordsCounts as $word => $count) {
        echo "$count\n";
    }
?>