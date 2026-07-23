<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    $table = [];
    for ($i = 0; $i < $N; $i++) {
        $input_line = trim(fgets(STDIN));
        $member_data = explode(" ", $input_line);
        for ($j = 0; $j < 2; $j++) {
            $table[$i][$j] = $member_data[$j];
            if ($j == 0) {
                echo "$member_data[$j] ";
            }
            if ($j == 1) {
                $update_age = $member_data[$j] + 1;
                echo "$update_age\n";
            }
        }
    }
    
?>