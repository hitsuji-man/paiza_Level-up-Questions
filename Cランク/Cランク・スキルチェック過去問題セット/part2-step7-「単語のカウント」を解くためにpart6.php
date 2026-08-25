<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_words = explode(" ", trim(fgets(STDIN)));
    $S = trim(fgets(STDIN));
    $count = 0;
    // print_r($input_words);
    // print_r($S);
    foreach ($input_words as $key => $word) {
        if ($S === $word) {
            echo "$key\n";
            $count++;
            if ($count > 0) {
                break;
            }
        }
        
    }
?>