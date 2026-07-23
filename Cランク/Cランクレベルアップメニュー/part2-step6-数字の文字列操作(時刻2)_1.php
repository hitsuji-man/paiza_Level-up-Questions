<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $s = explode(':', trim(fgets(STDIN)));

    $hour = (int)$s[0];
    $minitues = (int)$s[1];
    $minutes30later = $minitues + 30;
    $updateHour = $hour;
    $updateMinutes = $minutes30later;
    
    if ($minutes30later >= 60) {
        $updateHour = $hour + 1;
        $updateMinutes = $minutes30later - 60;
    }
    
    if (strlen($updateHour) == 1 && strlen($updateMinutes) == 2) {
        echo "0" . $updateHour . ":" . $updateMinutes . "\n";
    } elseif (strlen($updateHour) == 2 && strlen($updateMinutes) == 1) {
        echo $updateHour . ":" . "0" . $updateMinutes . "\n";
    } elseif (strlen($updateHour) == 1 && strlen($updateMinutes) == 1) {
        echo "0" . $updateHour . ":" . "0" . $updateMinutes . "\n";
    } else {
        echo $updateHour . ":" . $updateMinutes . "\n";
    }
    
    
?>