<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    $table = [];
    for ($i = 0; $i < $N; $i++) {
        $input_line = trim(fgets(STDIN));
        $member_data = explode(" ", $input_line);
        
        $table[$i][0] = $member_data[0];
        $table[$i][1] = intval($member_data[1]) + 1;
    }
    
    for ($i = 0; $i < $N; $i++) {
        echo implode(' ', $table[$i]) . "\n";
    }
    
?>