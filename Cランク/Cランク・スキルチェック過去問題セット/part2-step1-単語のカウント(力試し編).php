<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_words = explode(" ", trim(fgets(STDIN)));
    // print_r($input_words);
    $wordsCounts = [];
    foreach ($input_words as $word) {
        if (isset($wordsCounts[$word])) {
            $wordsCounts[$word]++;
        } else {
            $wordsCounts[$word] = 1;
        }
    }
    // print_r($wordsCounts);
    
    foreach ($wordsCounts as $word => $count) {
        echo "$word $count\n";
    } 
?>