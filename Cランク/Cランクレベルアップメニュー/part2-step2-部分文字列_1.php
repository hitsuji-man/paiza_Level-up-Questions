<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $search_word = trim(fgets(STDIN));
    $word = trim(fgets(STDIN));
    $word_array = str_split($word);
    // print_r($word_array);
    $isIncluded = false;
    
    for ($i = 0; $i < count($word_array); $i++) {
        if ($word_array[$i] == $search_word) {
            $isIncluded = true;
            break;
        }
    }
    if ($isIncluded) {
        echo "YES\n";
    } else {
        echo "NO\n";
    }
?>