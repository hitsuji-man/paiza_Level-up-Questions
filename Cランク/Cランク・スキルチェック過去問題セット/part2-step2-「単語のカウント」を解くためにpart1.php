<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_words = explode(" ", trim(fgets(STDIN)));
    foreach ($input_words as $word) {
        echo "$word\n";
    }
?>