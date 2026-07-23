<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $s = explode(':', trim(fgets(STDIN)));

    $hour = $s[0];
    $minitues = $s[1];
    $minutes30later = $minitues + 30;
    
    
    if ($minutes30later >= 60) {
        $hour = $hour + 1;
        $minutes30later = $minutes30later - 60;
    }
    
    if (mb_strlen($hour) === 1) {
        $hour = "0" . $hour;
    }
    if (mb_strlen($minutes30later) === 1) {
        $minutes30later = "0" . $minutes30later;
    }
    
    echo $hour . ":" . $minutes30later . "\n";
?>