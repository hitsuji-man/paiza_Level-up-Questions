<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $N = trim(fgets(STDIN));
    $inputs = [];
    $ballCount = 0;
    $strikeCount = 0;
    $fourballNum = 4;
    $outNum = 3;
    for ($i = 0; $i < $N; $i++) {
        $inputs[] = trim(fgets(STDIN));
    }
    
    foreach ($inputs as $i => $type) {
        if ($type == "ball") {
            $ballCount++;
        } elseif ($type == "strike") {
            $strikeCount++;
        }
        if ($ballCount == $fourballNum) {
            $type = "fourball";
        } 
        if ($strikeCount == $outNum) {
            $type = "out";
        }
        echo "$type!\n";
    }
?>