<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_words = explode(" ", trim(fgets(STDIN)));
    if (in_array("red", $input_words, true)) {
        echo "Yes\n"; 
    } else {
        echo "No\n";
    }
?>