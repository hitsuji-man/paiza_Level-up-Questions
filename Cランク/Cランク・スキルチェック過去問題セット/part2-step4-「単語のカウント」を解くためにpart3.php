<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_words = explode(" ", trim(fgets(STDIN)));
    $wordsHistory = [];
    foreach ($input_words as $word) {
        if (!in_array($word, $wordsHistory, true)) {
            $wordsHistory[] = $word;
            echo "$word\n";
        } else {
            echo "already_been\n";
        }
    }
?>