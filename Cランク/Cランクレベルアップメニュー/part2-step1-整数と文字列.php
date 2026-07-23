<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $n = trim(fgets(STDIN));
    for ($i = 0; $i < $n; $i++) {
        $text = trim(fgets(STDIN));
        echo strlen($text) . "\n";
    }
    
?>